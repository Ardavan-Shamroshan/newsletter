<?php

namespace App\Http\Services\Video;

use Illuminate\Support\Facades\Config;

class VideoService extends VideoToolsService
{
    public function save($video) {
        // set video
        $this->setVideo($video);

        // execute provider
        $this->provider();


        /**
         * in php we finally were saving $_FILES['video']['tmp_name'] in public folder but in laravel :
         *
         * Laravel : $video->getRealPath() ~ php : $_FILES['video']['tmp_name']
         */

        $filename = $this->getFinalVideoName() . '.' . $this->getVideoFormat();
        $path = public_path($this->getVideoAddress());
        $result = $video->move($path, $filename);

        return $result ? $this->getVideoFinalAddress() : false;
    }

    public function fitAndSave($video, $width, $height) {
        // set video
        $this->setVideo($video);

        // execute provider
        $this->provider();
        $result = Video::make($video->getRealPath())->fit($width, $height)->save(public_path($this->getVideoAddress()), null, $this->getVideoFormat());
        return $result ? $this->getVideoAddress() : false;
    }

    /**
     * @param $video
     * @return void
     *
     * {
     *      "indexArray" : {
     *          "large"         : "videos\/post-category\/2021\/11\/02\/1635833205\/1635833205_large.png",
     *          "medium"        : "videos\/post-category\/2021\/11\/02\/1635833205\/1635833205_medium.png",
     *          "small"         : "videos\/post-category\/2021\/11\/02\/1635833205\/1635833205_small.png",
     *          "directory"     : "videos\/post-category\/2021\/11\/02\/1635833205",
     *          "currentVideo"  : "medium"
     *      }
     * }
     *
     */
    public function createIndexAndSave($video) {
        // get data from config/video.php
        $videoSizes = Config::get('video.index-videos-size');

        // set video
        $this->setVideo($video);

        // set directory
        $this->getVideoDirectory() ?? $this->setVideoDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
        $this->setVideoDirectory($this->getVideoDirectory() . DIRECTORY_SEPARATOR . time());

        // set name
        $this->getVideoName() ?? $this->setVideoName(time());
        $videoName = $this->getVideoName();

        $indexArray = array();
        foreach ($videoSizes as $sizeAlias => $videoSize) {
            // create and set this size name
            $currentVideoName = $videoName . '_' . $sizeAlias;
            $this->setVideoName($currentVideoName);
            $this->provider();
            $result = Video::make($video->getRealPath())->fit($videoSize['width'], $videoSize['height'])->save(public_path($this->getVideoAddress()), null, $this->getVideoFormat());
            if ($result)
                $indexArray[$sizeAlias] = $this->getVideoAddress();
            else
                return false;
            // ($result == true) ? $indexArray[$sizeAlias] = $this->getVideoAddress() : false;
        }
        $videos['indexArray'] = $indexArray;
        $videos['directory'] = $this->getFinalVideoDirectory();
        $videos['currentVideo'] = Config::get('video.default-current-index-video');
        return $videos;
    }

    public function deleteVideo($videoPath) {
        if (file_exists($videoPath)) dd(unlink($videoPath));
    }

    public function deleteIndex($video) {
        $directory = public_path($video['directory']);
        $this->deleteDirectoryAndFiles($directory);
    }

    public function deleteDirectoryAndFiles($directory) {
        // is_dir($directory) returns false instead of true, because $directory is file path not a directory so filename.ext should be removed form $directory
        $directory = explode('\\', $directory);
        $lastIndex = (array_key_last($directory));
        unset($directory[$lastIndex]);
        $directory = implode(DIRECTORY_SEPARATOR, $directory);

        if (!is_dir($directory)) {
            return false;
        }

        $files = glob($directory . DIRECTORY_SEPARATOR . '*', GLOB_MARK);
        foreach ($files as $file)
            if (is_dir($file))
                $this->deleteDirectoryAndFiles($file);
            else
                unlink($file);

        return rmdir($directory);
    }
}
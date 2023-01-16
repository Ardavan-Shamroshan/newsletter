<?php

namespace App\Http\Services\Video;

class VideoToolsService
{
    /**
     *          final video directory     final video name
     *     ------------------------------- --------------
     *        exclusive dir     video dir     name    format
     *     -------------------- ----------- ---------- ----
     * ../ videos/post-category /2021/10/1/ 1634399399 .mp4
     */
    protected $video;
    protected $exclusiveDirectory;
    protected $videoDirectory;
    protected $videoName;
    protected $videoFormat;
    protected $finalVideoDirectory;
    protected $finalVideoName;

    /**
     * @return void
     *
     * creates uploaded-videos directory, name and format.
     */
    protected function provider() {
        // set properties
            $this->getVideoDirectory() ?? $this->setVideoDirectory(date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . date('d'));
            $this->getVideoName() ?? $this->setVideoName(time());
            $this->getVideoFormat() ?? $this->setVideoFormat($this->video->extension());

        // set final video directory
        $finalVideoDirectory = empty($this->getExclusiveDirectory()) ? $this->getVideoDirectory() : $this->getExclusiveDirectory() . DIRECTORY_SEPARATOR . $this->getVideoDirectory();
        $this->setFinalVideoDirectory($finalVideoDirectory);

        // set final video name
        $this->setFinalVideoName($this->getVideoName());

        // check and create final video directory
        $this->checkDirectory($this->getFinalVideoDirectory());
    }

    public function setVideo($video) {
        $this->video = $video;
    }

    public function getExclusiveDirectory() {
        return $this->exclusiveDirectory;
    }

    public function setExclusiveDirectory($exclusiveDirectory) {
        $this->exclusiveDirectory = trim($exclusiveDirectory, '/\\');

    }

    public function getVideoDirectory() {
        return $this->videoDirectory;
    }

    public function setVideoDirectory($videoDirectory) {
        $this->videoDirectory = trim($videoDirectory, '/\\');
    }

    public function getVideoName() {
        return $this->videoName;
    }

    public function setVideoName($videoName) {
        $this->videoName = $videoName;
    }

    /**
     * @return mixed|void
     *
     * returns back the specific current video
     * Laravel : $this->video->getClientOriginalName() ~ php : $_FILES['video']['name']
     */
    public function setCurrentVideoName() {
        return !empty($this->video) ? $this->setVideoName(pathinfo($this->video->getClientOriginalName(), PATHINFO_FILENAME)) : false;
    }

    public function getVideoFormat() {
        return $this->videoFormat;
    }

    public function setVideoFormat($videoFormat) {
        $this->videoFormat = $videoFormat;
    }

    public function getFinalVideoDirectory() {
        return $this->finalVideoDirectory;
    }

    public function setFinalVideoDirectory($finalVideoDirectory) {
        $this->finalVideoDirectory = $finalVideoDirectory;
    }

    public function getFinalVideoName() {
        return $this->finalVideoName;
    }

    public function setFinalVideoName($finalVideoName) {
        $this->finalVideoName = $finalVideoName;
    }

    protected function checkDirectory($videoDirectory) {
        if (!file_exists($videoDirectory)) if (!mkdir($videoDirectory, 0755, true) && !is_dir($videoDirectory)) {
            throw new \RuntimeException(sprintf('Directory "%s" was not created', $videoDirectory));
        }


//        if (!file_exists($videoDirectory)) mkdir($videoDirectory, 666, true);


//        if (!file_exists($videoDirectory)) if (!mkdir($videoDirectory, 666, true) && !is_dir($videoDirectory)) {
//            throw new \RuntimeException(sprintf('Directory "%s" was not created', $videoDirectory));
        //    }
    }

    public function getVideoAddress() {
        return $this->finalVideoDirectory . DIRECTORY_SEPARATOR . $this->finalVideoName;
    }

    public function getVideoFinalAddress() {
        return $this->finalVideoDirectory . DIRECTORY_SEPARATOR . $this->finalVideoName . DIRECTORY_SEPARATOR . $this->finalVideoName . '.' . $this->videoFormat;
    }
}
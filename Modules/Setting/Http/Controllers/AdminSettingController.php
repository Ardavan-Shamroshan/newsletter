<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Services\Image\ImageService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $setting = Setting::query()->first();
        return view('setting::admin.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('setting::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id) {
        return view('setting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Setting $setting) {
        return view('setting::admin.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(SettingRequest $request, Setting $setting, ImageService $imageService) {
        $inputs = $request->all();

        // logo upload
        if ($request->hasFile('logo')) {
            if (!empty($setting->logo))
                $imageService->deleteDirectoryAndFiles($setting->logo);
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            // Create image in 3 indexes and save
            $result = $imageService->fitAndSave($request->file('logo'), 1080, 1080);
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return to_route('admin.setting');
            }
            $inputs['logo'] = $result;
        }

            // icon upload
            if ($request->hasFile('icon')) {
                if (!empty($setting->icon))
                    $imageService->deleteDirectoryAndFiles($setting->icon);
                // Set image directory
                $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
                // Create image in 3 indexes and save
                $result = $imageService->fitAndSave($request->file('icon'), 1080, 1080);
                // If createIndexAndSize failed
                if ($result === false) {
                    toast('آپلود تصویر با خطا مواجه شد', 'error');
                    return to_route('admin.setting');
                }
                $inputs['icon'] = $result;
            }

        $setting->update($inputs);
        toast('تنظیمات با موفقیت ویرایش شد', 'success');
        return to_route('admin.setting');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        //
    }
}

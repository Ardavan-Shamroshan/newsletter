<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\League\Entities\League;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Http\Requests\SettingRequest;
use Modules\Slide\Entities\Slide;
use Modules\VideoGallery\Entities\VideoGallery;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        // posts
        $posts = Post::query()
            ->where('status', 1)
            ->orderBy('views', 'desc')
            ->paginate(5);

        $latestPosts = Post::query()
            ->where('status', 1)
            ->orderBy('created_at')
            ->get();

        $banner = Post::query()
            ->where('status', 1)
            ->latest()
            ->first();
        $categories = PostCategory::query()  ->where('status', 1)
            ->latest()
            ->get();

        $setting = Setting::query()->first();


        return view('home::index', compact('posts', 'banner','latestPosts','categories', 'setting'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        return view('home::create');
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
        return view('home::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('home::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id) {
        //
    }

    public function aboutUs() {
        $setting = Setting::query()->first();
        return view('home::about-us', compact('setting'));
    }
}

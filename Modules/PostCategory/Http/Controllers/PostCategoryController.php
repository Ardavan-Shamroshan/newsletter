<?php

namespace Modules\PostCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(PostCategory $postcategory)
    {
        $posts = $postcategory->posts()->where('status', 1)->orderBy('views', 'desc')->paginate(10);
        $latestPosts = Post::query()
            ->where('status', 1)
            ->orderBy('created_at')
            ->get();
        $categories = PostCategory::query()->where('status', 1)->get();
        return view('post::index', compact('posts', 'categories', 'latestPosts'))
            ->with('postcategory', $postcategory);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('postcategory::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(PostCategory $postcategory)
    {
        dd($postcategory->posts);
        return view('postcategory::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('postcategory::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }

    public function posts(PostCategory $postcategory) {
    }
}

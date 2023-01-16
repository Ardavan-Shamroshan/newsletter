<?php

namespace Modules\Post\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\PostCategory\Entities\PostCategory;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index() {
        $posts = Post::query()
            ->where('status', 1)
            ->orderBy('views', 'desc')
            ->paginate(10);

        $latestPosts = Post::query()
            ->where('status', 1)
            ->orderBy('created_at')
            ->get();

        $categories = PostCategory::query()->where('status', 1)
            ->latest()
            ->get();


        return view('post::index', compact('posts', 'categories', 'latestPosts'));
    }


    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post) {
        $latestPosts = Post::query()
            ->where('status', 1)
            ->orderBy('created_at')
            ->get();

        $categories = PostCategory::query()->where('status', 1)
            ->latest()
            ->get();

        $post->update([
            'views' => $post->views + 1
        ]);

        return view('post::show', compact('post', 'latestPosts', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id) {
        return view('post::edit');
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
}

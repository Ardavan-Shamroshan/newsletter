<?php

namespace Modules\Post\Http\Controllers;

use App\Http\Services\Image\ImageService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;
use Modules\PostCategory\Entities\PostCategory;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        // Posts
        $posts = Post::query()->filter($request)->paginate(10);
        $categories = PostCategory::query()->where('status', 1)->get();
        $postsCount = Post::query()->count();
        return view('post::admin.index', compact('postsCount', 'posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        // All active categories for post category_id selection
        $categories = PostCategory::query()->where('status', 1)->get();
        return view('post::admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request, ImageService $imageService) {
        $inputs = $request->all();

         $inputs['author_id'] = Auth::id();
//        $inputs['author_id'] = User::query()->first()->id;

        // Image upload
        if ($request->hasFile('image')) {
            // Set image directory
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            // Create image in 3 indexes and save
            $result = $imageService->createIndexAndSave($request->file('image'));
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return to_route('admin.post');
            }
            $inputs['image'] = $result;

            Post::query()->create($inputs);
            toast('خبر با موفقیت ایجاد شد', 'success');
            return to_route('admin.post');
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Post $post) {
        return view('post::admin.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post) {
        // All categories for parent selection
        $categories = PostCategory::query()->where('status', 1)->get();
        return view('post::admin.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostRequest $request, Post $post, ImageService $imageService) {
        $inputs = $request->all();

         $inputs['author_id'] = Auth::id();

        // Image upload
        if ($request->hasFile('image')) {
            if (!empty($post->image))
                $imageService->deleteDirectoryAndFiles($post->image['directory']);
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'post');
            $result = $imageService->createIndexAndSave($request->file('image'));
            // If createIndexAndSize failed
            if ($result === false) {
                toast('آپلود تصویر با خطا مواجه شد', 'error');
                return to_route('admin.post');
            }
            $inputs['image'] = $result;
        } // Change image current index size
        else
            if (isset($inputs['currentImage']) && !empty($post->image)) {
                $image = $post->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }

        $post->slug = null;
        $post->update($inputs);
        toast('خبر با موفقیت ویرایش شد', 'success');
        return to_route('admin.post');

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Post $post) {
        $post->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return to_route('admin.post');
    }


    // Duplicate or clone a database record
    public function clone(Post $post) {
        $clonedPost = $post->replicate();
        $clonedPost->save();
        toast('داده با موفقیت شبیه سازی شد', 'success');
        return to_route('admin.post');
    }

    public function isBanner(Post $post) {
        $post->is_banner = $post->is_banner == 0 ? 1 : 0;
        $result = $post->save();

        if ($result) {
            if ($post->is_banner == 0)
                return response()->json(['status' => true, 'checked' => false,
                ]);
            else
                return response()->json(['status' => true, 'checked' => true,]);
        } else
            return response()->json(['status' => false]);
    }

    public function status(Post $post) {
        $post->status = $post->status == 0 ? 1 : 0;
        $result = $post->save();

        if ($result) {
            if ($post->status == 0)
                return response()->json(['status' => true, 'checked' => false,
                ]);
            else
                return response()->json(['status' => true, 'checked' => true,]);
        } else
            return response()->json(['status' => false]);
    }


    public function commentable(Post $post) {
        $post->commentable = $post->commentable == 0 ? 1 : 0;
        $result = $post->save();
        if ($result) {
            if ($post->commentable == 0)
                return response()->json(['status' => true, 'checked' => false]);
            else
                return response()->json(['status' => true, 'checked' => true]);
        } else
            return response()->json(['status' => false]);
    }

}

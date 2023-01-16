<?php /** @noinspection ALL */

namespace Modules\PostCategory\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PostCategory\Entities\PostCategory;
use Modules\PostCategory\Http\Requests\PostCategoryRequest;

class AdminPostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request) {
        // All Categories
        $categories = PostCategory::query()->filter($request)->paginate(10);
        $categoriesCount = PostCategory::count();
        return view('postcategory::admin.index', compact('categories', 'categoriesCount'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create() {
        // All active categories for parent selection
        $categories = PostCategory::query()->where('status', 1)->get();
        return view('postcategory::admin.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PostCategoryRequest $request) {
        $inputs = $request->all();
        $postcategory = PostCategory::query()->create($inputs);
        toast('داده با موفقیت ایجاد شد', 'success');
        return to_route('admin.postcategory');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(PostCategory $postcategory) {
        return view('postcategory::admin.show', compact('postcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(PostCategory $postcategory) {
        // All categories for parent selection
        $categories = PostCategory::all();
        return view('postcategory::admin.edit', compact('categories', 'postcategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(PostCategoryRequest $request, PostCategory $postcategory) {
        $inputs = $request->all();
        $postcategory->update($inputs);
        toast('داده مورد نظر با موفقیت ویرایش شد', 'success');
        return to_route('admin.postcategory');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PostCategory $postcategory) {
        $postcategory->delete();
        toast('داده مورد نظر با موفقیت حذف شد', 'success');
        return to_route('admin.postcategory');
    }

    public function status(PostCategory $postcategory) {
        $postcategory->status = $postcategory->status == 0 ? 1 : 0;
        $result = $postcategory->save();
        if ($result) {
            if ($postcategory->status == 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false,
                ]);
            } else
                return response()->json([
                    'status' => true,
                    'checked' => true,
                ]);
        } else
            return response()->json(['status' => false]);
    }
}

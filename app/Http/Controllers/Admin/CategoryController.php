<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('category-list');

        $categories = Category::latest()->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = $slug . '-' . date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('categories')) {
                Storage::disk('public')->makeDirectory('categories');
            }

            //Storage::disk('public')->put('categories/' . $fileName, file_get_contents($image));

            // used image intervention
            $categoryImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('categories/' . $fileName, $categoryImage);
        }

        try {
            Category::create([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image' => $fileName ?? null,
                'is_active' => $request->is_active ?? false
            ]);

            // return redirect()->route('admin.categories.index')->with('message', 'Category Successfully Saved !');
            return redirect()->route('admin.categories.index')->withMessage('Category Successfully Created !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        // $category = Category::findOrFail($category);
        $this->authorize('category-list');

        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($category);
        $this->authorize('category-list');

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        // $category = Category::findOrFail($category);

        // $request->validate([
        //     'title' => 'required|min:3|max:15|unique:categories,title,' . $category->id 
        // ]);
        $this->authorize('category-list');
        
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = $slug . '-' . date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('categories')) {
                Storage::disk('public')->makeDirectory('categories');
            }

            //delete old category image
            if (Storage::disk('public')->exists('categories/' . $category->image)) {
                Storage::disk('public')->delete('categories/' . $category->image);
            }

            //Storage::disk('public')->put('categories/' . $fileName, file_get_contents($image));

            // used image intervention
            $categoryImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('categories/' . $fileName, $categoryImage);
        }

        try {
            $category->update([
                'title' => $request->title,
                'slug' => $slug,
                'description' => $request->description,
                'image' => $fileName ?? $category->image,
                'is_active' => $request->is_active ?? false
            ]);

            return redirect()->route('admin.categories.index')->with('message', 'Category Successfully Updated !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // $category = Category::findOrFail($category);
        $this->authorize('category-list');
        try {

            // $this->authorize('category-delete', $category);

            $category->delete();

            return redirect()->route('admin.categories.index')->with('message', 'Category Successfully Trashed !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    public function restore($id)
    {
        try {
            $category = Category::onlyTrashed()->whereId($id)->firstOrFail();
            $category->restore();
            return redirect()->back()->withMessage('Category Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        $category = Category::onlyTrashed()->whereId($id)->firstOrFail();

        if (Storage::disk('public')->exists('categories/' . $category->image)) {
            Storage::disk('public')->delete('categories/' . $category->image);
        }

        try {
            $category->forceDelete();
            return redirect()->back()->withMessage('Category Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}

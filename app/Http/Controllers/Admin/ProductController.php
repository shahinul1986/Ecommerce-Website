<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('product-list');

        $products = Product::latest()->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::active()->pluck('title', 'id')->toArray();
        $sizes = Size::pluck('title', 'id')->toArray();
        $colors = Color::pluck('title', 'id')->toArray();
       
        return view('admin.products.create', compact('categories', 'sizes', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        // also validated in ProductRequest
        $categories = Category::findOrFail($request->category);
        $sizes = Size::findOrFail($request->size);
        $colors = Color::findOrFail($request->color);

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = $slug . '-' . date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }

            //Storage::disk('public')->put('products/' . $fileName, file_get_contents($image));

            // used image intervention
            $productImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('products/' . $fileName, $productImage);
        }

        try {
            $product = Product::create([
                'title' => $request->title,
                'slug' => $slug,
                'summary' => $request->summary,
                'description' => $request->description,
                // 'brand_id' => Brand::all()->random()->id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                //'discounted_price' => $request->price - ($request->price * 10 / 100),
                'discounted_price' => $request->discounted_price,
                // 'quantity' => rand(2, 50),
                'quantity' => $request->quantity,
                'in_stock' => $request->in_stock ?? false,
                'is_featured' => $request->is_featured ?? false,
                'image' => $fileName ?? null,
                'is_active' => $request->is_active ?? false
            ]);

            $product->categories()->attach($categories);
            $product->sizes()->attach($sizes);
            $product->colors()->attach($colors);

            return redirect()->route('admin.products.index')->withMessage('Product Successfully Created !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::active()->pluck('title', 'id')->toArray();
        $sizes = Size::pluck('title', 'id')->toArray();
        $colors = Color::pluck('title', 'id')->toArray();
        $selectedCategories = $product->categories->pluck('id')->toArray();
        $selectedSizes = $product->sizes->pluck('id')->toArray();
        $selectedColors = $product->colors->pluck('id')->toArray();

        return view('admin.products.edit', compact('categories', 'sizes', 'colors', 
                    'product', 'selectedCategories', 'selectedSizes', 'selectedColors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        //dd($request->all());
        $image = $request->file('image');
        $slug = Str::slug($request->title);

        // also validated in ProductRequest
        $categories = Category::findOrFail($request->category);
        $sizes = Size::findOrFail($request->size);
        $colors = Color::findOrFail($request->color);

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = $slug . '-' . date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('products')) {
                Storage::disk('public')->makeDirectory('products');
            }

            //delete old product image
            if (Storage::disk('public')->exists('products/' . $product->image)) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            //Storage::disk('public')->put('products/' . $fileName, file_get_contents($image));

            // used image intervention
            $productImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('products/' . $fileName, $productImage);
        }

        try {
            $product->update([
                'title' => $request->title,
                'slug' => $slug,
                'summary' => $request->summary,
                'description' => $request->description,
                // 'brand_id' => Brand::all()->random()->id,
                'brand_id' => $request->brand_id,
                'price' => $request->price,
                //'discounted_price' => $request->price - ($request->price * 10 / 100),
                'discounted_price' => $request->discounted_price,
                // 'quantity' => rand(2, 50),
                'quantity' => $request->quantity,
                'in_stock' => $request->in_stock ?? false,
                'is_featured' => $request->is_featured ?? false,
                'image' => $fileName ?? $product->image,
                'is_active' => $request->is_active ?? false
            ]);

            $product->categories()->sync($categories);
            $product->sizes()->sync($sizes);
            $product->colors()->sync($colors);

            return redirect()->route('admin.products.index')->withMessage('Product Successfully Updated !');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->categories()->detach();
        $product->sizes()->detach();
        $product->colors()->detach();
        $product->delete();
        return redirect()->route('admin.products.index')->withMessage('Product Successfully Deleted !');
    }
}

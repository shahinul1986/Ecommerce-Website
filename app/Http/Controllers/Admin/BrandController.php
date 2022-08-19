<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->get();
        //dd($brands);
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $this->authorize('brand-list');
        try {
            Brand::create([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'is_active' => $request->is_active ?? false
            ]);

            return redirect()->route('admin.brands.index')->withMessage('Brand Successfully Created !');
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
    public function show(Brand $brand)
    {
        $this->authorize('brand-list');
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $this->authorize('brand-list');
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $brand)
    {
        // $request->validate([
        //     'title' => 'required|min:3|max:15|unique:brands,title,' . $brand->id 
        // ]);

        try {
            $brand->update([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'is_active' => $request->is_active ?? false
            ]);

            return redirect()->route('admin.brands.index')->with('message', 'Brand Successfully Updated !');
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
    public function destroy(Brand $brand)
    {
        $this->authorize('brand-list');
        try {
            $brand->delete();

            return redirect()->route('admin.brands.index')->with('message', 'Brand Successfully Deleted !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DistrictRequest;
use Illuminate\Database\QueryException;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::latest()->get();

        return view('admin.districts.index', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.districts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        try {
            District::create([
                'name' => $request->name
            ]);

            return redirect()->route('admin.districts.index')->withMessage('District Successfully Created !');
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
    public function show(District $district)
    {
        $this->authorize('district-list');
        return view('admin.districts.show', compact('district'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(District $district)
    {
        $this->authorize('district-list');
        return view('admin.districts.edit', compact('district'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, District $district)
    {
        // $request->validate([
        //     'name' => 'required|min:3|max:20|unique:districts,name,' . $district->id
        // ]);
        $this->authorize('district-list');
        try {
            $district->update([
                'name' => $request->name
            ]);

            return redirect()->route('admin.districts.index')->with('message', 'District Successfully Updated !');
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
    public function destroy(District $district)
    {
        $this->authorize('district-list');
        try {
            $district->delete();

            return redirect()->route('admin.districts.index')->with('message', 'District Successfully Deleted !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }
}

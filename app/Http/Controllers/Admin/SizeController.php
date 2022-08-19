<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::latest()->get();

        return view('admin.sizes.index', compact('sizes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sizes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SizeRequest $request)
    {
        try {
            Size::create([
                'title' => $request->title
            ]);

            return redirect()->route('admin.sizes.index')->withMessage('Size Successfully Created !');
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
    public function show(Size $size)
    {
        $this->authorize('size-list');
        return view('admin.sizes.show', compact('size'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Size $size)
    {
        $this->authorize('size-list');
        return view('admin.sizes.edit', compact('size'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SizeRequest $request, Size $size)
    {
        // $request->validate([
        //     'title' => 'required|min:1|max:15|unique:sizes,title,' . $size->id 
        // ]);
        $this->authorize('size-list');
        try {
            $size->update([
                'title' => $request->title
            ]);

            return redirect()->route('admin.sizes.index')->with('message', 'Size Successfully Updated !');
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
    public function destroy(Size $size)
    {
        $this->authorize('size-list');
        try {
            $size->delete();

            return redirect()->route('admin.sizes.index')->with('message', 'Size Successfully Deleted !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }
}

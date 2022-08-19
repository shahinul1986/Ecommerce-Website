<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        try {
            Tag::create([
                'title' => $request->title
            ]);

            return redirect()->route('admin.tags.index')->withMessage('Tag Successfully Created !');
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
    public function show(Tag $tag)
    {
        $this->authorize('tag-list');
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        $this->authorize('tag-list');
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, Tag $tag)
    {
        // $request->validate([
        //     'title' => 'required|min:1|max:15|unique:tags,title,' . $tag->id
        // ]);
        $this->authorize('tag-list');
        try {
            $tag->update([
                'title' => $request->title
            ]);

            return redirect()->route('admin.tags.index')->with('message', 'Tag Successfully Updated !');
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
    public function destroy(Tag $tag)
    {
        $this->authorize('tag-list');
        try {
            $tag->delete();

            return redirect()->route('admin.tags.index')->with('message', 'Tag Successfully Deleted !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }
}

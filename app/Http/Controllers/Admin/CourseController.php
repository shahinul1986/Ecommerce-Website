<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CourseRequest $request)
    {
        $image = $request->file('banner');

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('courses')) {
                Storage::disk('public')->makeDirectory('courses');
            }

            //Storage::disk('public')->put('courses/' . $fileName, file_get_contents($image));

            // used image intervention
            $courseImage = Image::make($image)->resize(280,280)->stream();

            Storage::disk('public')->put('courses/'.$fileName, $courseImage);
        }

        try {
            Course::create([
                'title' => $request->title,
                'batch_no' => $request->batch_no,
                'class_start_date' => $request->class_start_date,
                'class_end_date' => $request->class_end_date,
                'instructor_name' => $request->instructor_name,
                'banner' => $fileName ?? null,
                'course_type' => $request->course_type,
                'is_active' => $request->is_active ?? false
            ]);

            // return redirect()->route('admin.categories.index')->with('message', 'Category Successfully Saved !');
            return redirect()->route('admin.courses.index')->withMessage('Course Successfully Created !');
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
    public function show(Course $course)
    {
        $this->authorize('course-list');
        return view('admin.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $this->authorize('course-list');
        return view('admin.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CourseRequest $request, Course $course)
    {
        $this->authorize('course-list');
        $image = $request->file('banner');

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('courses')) {
                Storage::disk('public')->makeDirectory('courses');
            }

            //delete old product image
            if (Storage::disk('public')->exists('courses/' . $course->banner)) {
                Storage::disk('public')->delete('courses/' . $course->banner);
            }

            //Storage::disk('public')->put('courses/' . $fileName, file_get_contents($image));

            // used image intervention
            $courseImage = Image::make($image)->resize(280,280)->stream();

            Storage::disk('public')->put('courses/'.$fileName, $courseImage);
        }

        try {
            $course->update([
                'title' => $request->title,
                'batch_no' => $request->batch_no,
                'class_start_date' => $request->class_start_date,
                'class_end_date' => $request->class_end_date,
                'instructor_name' => $request->instructor_name,
                'banner' => $fileName ?? $course->banner,
                'course_type' => $request->course_type,
                'is_active' => $request->is_active ?? false
            ]);

            return redirect()->route('admin.courses.index')->with('message', 'Course Successfully Updated !');
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
    public function destroy(Course $course)
    {
        $this->authorize('course-list');
        try {
            $course->delete();

            return redirect()->route('admin.courses.index')->with('message', 'Course Successfully Trashed !');
        } catch (QueryException $e) {

            return redirect()->back()->withInput()->withError($e->getMessage());
        }
    }

    public function trash()
    {
        $courses = Course::onlyTrashed()->get();
        return view('admin.courses.trash', compact('courses'));
    }

    public function restore($id)
    {
        try {
            $course = Course::onlyTrashed()->whereId($id)->firstOrFail();
            $course->restore();
            return redirect()->back()->withMessage('Course Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        $course = Course::onlyTrashed()->whereId($id)->firstOrFail();

        if (Storage::disk('public')->exists('courses/' . $course->banner)) {
            Storage::disk('public')->delete('courses/' . $course->banner);
        }

        try {
            $course->forceDelete();
            return redirect()->back()->withMessage('Course Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}

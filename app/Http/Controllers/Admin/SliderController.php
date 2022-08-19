<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Slider;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Image;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->paginate(4);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $image = $request->file('image');

        if (file_exists($image)) {
            //make unique name for image
            $fileName  = date('dmY') . time() . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('sliders')) {
                Storage::disk('public')->makeDirectory('sliders');
            }

            //Storage::disk('public')->put('sliders/' . $fileName, file_get_contents($image));

            // used image intervention
            $categoryImage = Image::make($image)->resize(280, 280)->stream();

            Storage::disk('public')->put('sliders/' . $fileName, $categoryImage);
        }
        try {
            $slider = new Slider();
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->content_position = $request->input('content_position');
            $slider->btn_text = $request->input('btn_text');
            $slider->btn_link = $request->input('btn_link');
            $slider->image_uri = $fileName ?? null;
            $slider->save();
            return redirect()->route('admin.sliders.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function show(Slider $slider) //route model binding
    {
        // dd($category->products);
        
        return view('admin.sliders.show', compact('slider'));
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        try {
            $slider = Slider::find($id);
            $slider->title = $request->input('title');
            $slider->sub_title = $request->input('sub_title');
            $slider->content_position = $request->input('content_position');
            $slider->btn_text = $request->input('btn_text');
            $slider->btn_link = $request->input('btn_link');
            $slider->image_uri = $fileName ?? $slider->image_url;
            $slider->save();
            return redirect()->route('admin.sliders.index')->withMessage('Successfully Created');
        } catch (QueryException $e) {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $slider = Slider::find($id);
            if ($slider->image_uri && file_exists(storage_path('app/public/sliders/' . $slider->image_uri) && $slider->image_url)) {
                unlink(storage_path('app/public/sliders/' . $slider->image_url));
            }

            $slider->delete();
            return redirect()->route('admin.sliders.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function trash()
    {
        $sliders = Slider::onlyTrashed()->paginate(2);
        return view('admin.sliders.trash', compact('sliders'));
    }

    public function restore($id)
    {
        try {
            $slider = Slider::onlyTrashed()->whereId($id)->firstOrFail();
            $slider->restore();
            return redirect()->back()->withMessage('Successfully Restored !');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $slider = Slider::onlyTrashed()->whereId($id)->firstOrFail();
            $slider->forceDelete();
            return redirect()->route('admin.sliders.index')->withMessage('Successfully Deleted');
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function uploadImage($file = null)
    {
        if (is_null($file)) return $file;

        $fileName = date('dmY') . time() . '.' . $file->getClientOriginalExtension();
        Image::make($file)
            ->resize(300, 200)
            ->save(storage_path('app/public/sliders/' . $fileName));
        return $fileName;
    }

    
}

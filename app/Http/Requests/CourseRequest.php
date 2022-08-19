<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:15|unique:courses,title,' . $this->route('course')?->id,
            'batch_no' => 'required|numeric|min:1',
            'class_start_date' => 'required|date',
            'class_end_date' => 'required|date',
            'instructor_name' => 'min:3|max:15',
            'course_type' => 'required',
            'banner' => 'mimes:png,jpg,jfif,jpeg'
        ];
    }
}

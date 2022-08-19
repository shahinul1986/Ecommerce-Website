<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        /*if (CategoryRequest::isMethod('post')) {
            return [
                'title' => 'required|min:3|max:15|unique:categories',
                'description' => 'nullable|min:10|max:200'
            ];
        }
        else{
            return [
                'title' => 'required|min:3|max:15|unique:categories,title,' . $this->route('category')->id,
                'description' => 'nullable|min:10|max:200'
            ];
        }*/

        return [
            'title' => 'required|min:3|max:15|unique:categories,title,' . $this->route('category')?->id,
            'description' => 'nullable|min:10|max:200'
        ];
    }
}

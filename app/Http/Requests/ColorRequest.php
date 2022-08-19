<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
        /*if (ColorRequest::isMethod('post')) {
            return [
                'title' => 'required|min:3|max:15|unique:colors',
                'color_code' => 'required|unique:colors'
            ];
        }
        else{
            return [
                'title' => 'required|min:3|max:15|unique:colors,title,' . $this->route('color')->id,
                'color_code' => 'required|unique:colors,color_code,' . $this->route('color')->id
            ];
        }*/

        return [
            'title' => 'required|min:3|max:15|unique:colors,title,' . $this->route('color')?->id,
            'color_code' => 'required|unique:colors,color_code,' . $this->route('color')?->id
        ];

    }
}

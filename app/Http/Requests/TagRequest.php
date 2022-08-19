<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        /*if (TagRequest::isMethod('post')) {
            return [
                'title' => 'required|min:1|max:15|unique:tags'
            ];
        }
        else{
            return [
                'title' => 'required|min:1|max:15|unique:tags,title,' . $this->route('tag')->id
            ];
        }*/

        return [
            'title' => 'required|min:1|max:15|unique:tags,title,' . $this->route('tag')?->id
        ];
    }
}

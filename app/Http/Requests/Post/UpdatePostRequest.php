<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|unique:posts,title,'.$this->post['id'],
            'description' =>'required|min:10',
            'user_id' => 'exists:posts,user_id'
        ];

    }

    public function messages()
    {
        return[
            'title.required' => 'Title is required',
            'title.min' => 'Minimum character is 3',
            'title.unique' => 'Title must be unique',
            'description.required' => 'Description is required',
            'description.min' => 'Minimum character is 10'
        ];
    }
}

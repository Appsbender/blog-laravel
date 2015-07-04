<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostsFormRequest extends Request
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
            'title' => 'required|min:2|max:250',
            'description' => 'required',
            'short_description' => 'required',
            'seo_description' => 'required',
            'categoriesList' => 'required',
            'tagsList' => 'required'
        ];
    }
}

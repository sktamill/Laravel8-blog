<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tags_id' => 'nullable|array',
            'tags_id.*' => 'integer|nullable|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The Post Name is required!',
            'title.string' => 'The Post Name must be a String type!',
            'content.required' => 'The Post Content must is required!!',
            'preview_image.required' => 'The Preview Image is required!!',
            'preview_image.file' => 'The Preview Image must be a image File!',
            'main_image.required' => 'The Main Image is required!!',
            'main_image.file' => 'The Main Image must be a image File!',
            'category_id.required' => 'Select a Category name!',
        ];
    }
}

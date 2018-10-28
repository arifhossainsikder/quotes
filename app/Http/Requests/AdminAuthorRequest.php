<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminAuthorRequest extends FormRequest
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
			'name' => 'required|max:255',
			'photo_id' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		];
    }

	public function messages()
	{
		return [
			'name.required' => 'Please enter author name',
			'photo_id.image' => 'File must be an image',
			'photo_id.mimes' => 'Photo must be a file of type: jpeg, png, jpg, gif, svg',
			'photo_id.max' => 'Photo may not be greater than 2MB',
		];
	}
}

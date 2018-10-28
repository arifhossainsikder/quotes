<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminPostRequest extends FormRequest
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
			'quote' => 'required',
			'author_id' => 'required',
			'categories' => 'required',
        ];
    }

	public function messages()
	{
		return [
			'quote.required' => 'Please enter quote',
			'author_id.required' => 'Please select author',
			'categories.required' => 'Please select category',
		];
	}
}

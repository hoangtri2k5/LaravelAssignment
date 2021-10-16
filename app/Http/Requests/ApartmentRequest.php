<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApartmentRequest extends FormRequest
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
            'name' => 'required|min:10|max:50',
            'address' => 'required',
            'price' => 'numeric|not_in:0',
            'thumbnail' => 'url',
            'content' => 'required',
            'detail' => 'required',
            'status' => 'required|integer|min:1|max:3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.min' => 'eventName must at least 10 character',
            'name.max' => 'eventName is not more than 50 character',
            'address.required' => 'Please enter address',
            'price.required' => 'Please enter price',
            'thumbnail.url' => 'thumbnail must url',
            'status.required' => 'status must 1-3',
            'content.required' => 'Please enter content',
            'detail.required' => 'Please enter detail',
        ];
    }
}

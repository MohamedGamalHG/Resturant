<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name'          => 'required',
            'description'   => 'required|min:10',
            'price'         => 'required|integer',
            'image'         => 'mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return[
            'name.required'          => 'the name is required ',
            'description.required'   => 'the desciption is required ',
            'description.min'        => 'the desciption must be greater that 10 character ',
            'price.required'         => 'the price is required',
            'price.integer'          => 'the price must be a number',
        ];
    }
}

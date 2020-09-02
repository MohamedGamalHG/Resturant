<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Slider;


class TitleRequest extends FormRequest
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
            'title'     => 'required',
            'sub_title' => 'required',
            'photo'     => 'mimes:png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return[
            'title.required'         => 'the title is required',
            'sub_title.required'     => 'the sub-title is required',
        ];
    }
}

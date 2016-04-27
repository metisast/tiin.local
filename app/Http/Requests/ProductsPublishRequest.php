<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductsPublishRequest extends Request
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
            'title' => 'required|max:255',
            'category_id' => 'required',
            'category_sub_id' => 'required',
            'description' => 'required|max:500',
            'price' => 'required|min:100|max:1000000|integer',
            'region_id' => 'required',
            'city_id' => 'required',
            'license' => 'accepted:license'
        ];
    }
}

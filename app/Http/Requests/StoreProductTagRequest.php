<?php

namespace App\Http\Requests;

use App\ProductTag;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('product_tag_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}

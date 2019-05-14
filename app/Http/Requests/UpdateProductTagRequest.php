<?php

namespace App\Http\Requests;

use App\ProductTag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('product_tag_edit');
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

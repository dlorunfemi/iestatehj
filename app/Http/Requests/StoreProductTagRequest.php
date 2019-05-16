<?php

namespace App\Http\Requests;

use App\PropertyTag;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('property_tag_create');
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

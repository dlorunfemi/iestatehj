<?php

namespace App\Http\Requests;

use App\PropertyCategory;
use Illuminate\Foundation\Http\FormRequest;

class StorePropertyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('property_category_create');
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

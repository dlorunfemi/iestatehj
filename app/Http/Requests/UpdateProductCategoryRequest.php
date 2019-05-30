<?php

namespace App\Http\Requests;

use App\PropertyCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('property_category_edit');
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

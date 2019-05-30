<?php

namespace App\Http\Requests;

use App\PropertyCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPropertyCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('property_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:property_categories,id',
        ];
    }
}

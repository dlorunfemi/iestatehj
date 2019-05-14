<?php

namespace App\Http\Requests;

use App\ProductCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyProductCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('product_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:product_categories,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\IncomeCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyIncomeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('income_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:income_categories,id',
        ];
    }
}

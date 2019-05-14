<?php

namespace App\Http\Requests;

use App\ExpenseCategory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyExpenseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('expense_category_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expense_categories,id',
        ];
    }
}

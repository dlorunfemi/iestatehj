<?php

namespace App\Http\Requests;

use App\Expense;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyExpenseRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('expense_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:expenses,id',
        ];
    }
}

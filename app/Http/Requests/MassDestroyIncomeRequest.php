<?php

namespace App\Http\Requests;

use App\Income;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyIncomeRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('income_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:incomes,id',
        ];
    }
}

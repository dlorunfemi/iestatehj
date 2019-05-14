<?php

namespace App\Http\Requests;

use App\ExpenseCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateExpenseCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('expense_category_edit');
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

<?php

namespace App\Http\Requests;

use App\IncomeCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateIncomeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('income_category_edit');
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

<?php

namespace App\Http\Requests;

use App\IncomeCategory;
use Illuminate\Foundation\Http\FormRequest;

class StoreIncomeCategoryRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('income_category_create');
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

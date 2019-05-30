<?php

namespace App\Http\Requests;

use App\Vacancy;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVacancyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('vacancy_edit');
    }

    public function rules()
    {
        return [
            'property_id'     => [
                'required',
                'integer',
            ],
            'property_tag_id' => [
                'required',
                'integer',
            ],
            'is_vacant'       => [
                'required',
            ],
            'rent'            => [
                'required',
            ],
        ];
    }
}

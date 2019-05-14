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
            'properties.*'    => [
                'integer',
            ],
            'properties'      => [
                'required',
                'array',
            ],
            'is_vacant'       => [
                'required',
            ],
            'property_tags.*' => [
                'integer',
            ],
            'property_tags'   => [
                'required',
                'array',
            ],
            'rent'            => [
                'required',
            ],
        ];
    }
}

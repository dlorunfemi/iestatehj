<?php

namespace App\Http\Requests;

use App\Vacancy;
use Illuminate\Foundation\Http\FormRequest;

class StoreVacancyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('vacancy_create');
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
            'created_by_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}

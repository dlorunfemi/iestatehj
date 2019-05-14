<?php

namespace App\Http\Requests;

use App\Vacancy;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyVacancyRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('vacancy_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:vacancies,id',
        ];
    }
}

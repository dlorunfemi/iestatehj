<?php

namespace App\Http\Requests;

use App\Requistion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyRequistionRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('requistion_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:requistions,id',
        ];
    }
}

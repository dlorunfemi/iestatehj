<?php

namespace App\Http\Requests;

use App\Property;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPropertyRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('property_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:properties,id',
        ];
    }
}

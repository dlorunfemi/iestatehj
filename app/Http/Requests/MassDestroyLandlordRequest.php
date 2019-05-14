<?php

namespace App\Http\Requests;

use App\Landlord;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyLandlordRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('landlord_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:landlords,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Requistion;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequistionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('requistion_create');
    }

    public function rules()
    {
        return [
            'property_id'         => [
                'required',
                'integer',
            ],
            'landlord_id'         => [
                'required',
                'integer',
            ],
            'amount_withdraw'     => [
                'required',
            ],
            'initiating_staff_id' => [
                'required',
                'integer',
            ],
            'status'              => [
                'required',
            ],
        ];
    }
}

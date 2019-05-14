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
            'properties.*'        => [
                'integer',
            ],
            'properties'          => [
                'required',
                'array',
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

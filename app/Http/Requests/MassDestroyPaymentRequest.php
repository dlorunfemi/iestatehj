<?php

namespace App\Http\Requests;

use App\Payment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPaymentRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('payment_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:payments,id',
        ];
    }
}

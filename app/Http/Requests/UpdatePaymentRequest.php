<?php

namespace App\Http\Requests;

use App\Payment;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('payment_edit');
    }

    public function rules()
    {
        return [
            'property_id'           => [
                'required',
                'integer',
            ],
            'landlord_id'           => [
                'required',
                'integer',
            ],
            'tenant_id'             => [
                'required',
                'integer',
            ],
            'apartment_id'          => [
                'required',
                'integer',
            ],
            'annual_charge'         => [
                'required',
            ],
            'payment_date'          => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rent_from'             => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rent_to'               => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'payment_type'          => [
                'required',
            ],
            'is_confirm_by_id'      => [
                'required',
                'integer',
            ],
            'is_confirmed_date'     => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'is_confirmed_gm_date'  => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'is_confirmed_ceo_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'date_cancelled'        => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Payment;
use Illuminate\Foundation\Http\FormRequest;

class StorePaymentRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('payment_create');
    }

    public function rules()
    {
        return [
            'properties.*'         => [
                'integer',
            ],
            'properties'           => [
                'required',
                'array',
            ],
            'landlords.*'          => [
                'integer',
            ],
            'landlords'            => [
                'required',
                'array',
            ],
            'tenants.*'            => [
                'integer',
            ],
            'tenants'              => [
                'required',
                'array',
            ],
            'annual_charge'        => [
                'required',
            ],
            'payment_date'         => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rent_from'            => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'rent_to'              => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'payment_type'         => [
                'required',
            ],
            'confirm_staffs.*'     => [
                'integer',
            ],
            'confirm_staffs'       => [
                'array',
            ],
            'is_confirmed_date'    => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'is_confirmed_gm_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'created_by_id'        => [
                'required',
                'integer',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Requistion;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequistionRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('requistion_edit');
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
            'acc_conf_date'       => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'gm_conf_date'        => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'ceo_conf_date'       => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'return_date'         => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
        ];
    }
}

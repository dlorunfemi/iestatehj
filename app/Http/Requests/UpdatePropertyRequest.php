<?php

namespace App\Http\Requests;

use App\Property;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('property_edit');
    }

    public function rules()
    {
        return [
            'landlord_id'      => [
                'required',
                'integer',
            ],
            'property_type_id' => [
                'required',
                'integer',
            ],
            'name'             => [
                'required',
            ],
            'is_new'           => [
                'required',
            ],
            'state'            => [
                'required',
            ],
            'is_bank'          => [
                'required',
            ],
            'is_dormant'       => [
                'required',
            ],
            'dormant_date'     => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'officer_id'       => [
                'required',
                'integer',
            ],
        ];
    }
}

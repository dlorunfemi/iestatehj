<?php

namespace App\Http\Requests;

use App\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('product_edit');
    }

    public function rules()
    {
        return [
            'landlord_id'  => [
                'required',
                'integer',
            ],
            'categories.*' => [
                'integer',
            ],
            'categories'   => [
                'required',
                'array',
            ],
            'is_new'       => [
                'required',
            ],
            'name'         => [
                'required',
            ],
            'state'        => [
                'required',
            ],
            'is_bank'      => [
                'required',
            ],
            'is_dormant'   => [
                'required',
            ],
            'dormant_date' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'officer_id'   => [
                'required',
                'integer',
            ],
        ];
    }
}

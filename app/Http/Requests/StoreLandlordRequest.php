<?php

namespace App\Http\Requests;

use App\Landlord;
use Illuminate\Foundation\Http\FormRequest;

class StoreLandlordRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('landlord_create');
    }

    public function rules()
    {
        return [
            'title'          => [
                'required',
            ],
            'name'           => [
                'required',
            ],
            'phone'          => [
                'required',
            ],
            'address_office' => [
                'required',
            ],
            'officer_id'     => [
                'required',
                'integer',
            ],
            'created_by_id'  => [
                'required',
                'integer',
            ],
        ];
    }
}

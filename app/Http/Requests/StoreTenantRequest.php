<?php

namespace App\Http\Requests;

use App\Tenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tenant_create');
    }

    public function rules()
    {
        return [
            'name'          => [
                'required',
            ],
            'phone'         => [
                'required',
            ],
            'email'         => [
                'required',
            ],
            'property_id'   => [
                'required',
                'integer',
            ],
            'apartment_id'  => [
                'required',
                'integer',
            ],
            'is_active'     => [
                'required',
            ],
            'created_by_id' => [
                'required',
                'integer',
            ],
        ];
    }
}

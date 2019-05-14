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
            'properties.*'  => [
                'integer',
            ],
            'properties'    => [
                'required',
                'array',
            ],
            'apartments.*'  => [
                'integer',
            ],
            'apartments'    => [
                'array',
            ],
            'phone'         => [
                'required',
            ],
            'email'         => [
                'required',
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

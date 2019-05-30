<?php

namespace App\Http\Requests;

use App\Tenant;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTenantRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('tenant_edit');
    }

    public function rules()
    {
        return [
            'name'         => [
                'required',
            ],
            'phone'        => [
                'required',
            ],
            'email'        => [
                'required',
            ],
            'property_id'  => [
                'required',
                'integer',
            ],
            'apartment_id' => [
                'required',
                'integer',
            ],
            'is_active'    => [
                'required',
            ],
        ];
    }
}

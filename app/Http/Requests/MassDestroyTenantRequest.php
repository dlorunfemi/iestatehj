<?php

namespace App\Http\Requests;

use App\Tenant;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyTenantRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('tenant_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tenants,id',
        ];
    }
}

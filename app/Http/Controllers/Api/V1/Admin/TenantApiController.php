<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Tenant;

class TenantApiController extends Controller
{
    public function index()
    {
        $tenants = Tenant::all();

        return $tenants;
    }

    public function store(StoreTenantRequest $request)
    {
        return Tenant::create($request->all());
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        return $tenant->update($request->all());
    }

    public function show(Tenant $tenant)
    {
        return $tenant;
    }

    public function destroy(Tenant $tenant)
    {
        return $tenant->delete();
    }
}

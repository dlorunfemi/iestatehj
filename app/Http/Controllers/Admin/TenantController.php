<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTenantRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Product;
use App\ProductTag;
use App\Tenant;
use App\User;
use Illuminate\Support\Facades\Auth;

class TenantController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('tenant_access'), 403);

        $tenants = Tenant::all();

        return view('admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('tenant_create'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $apartments = ProductTag::all()->pluck('name', 'id');

        $auth = Auth::user();

        return view('admin.tenants.create', compact('properties', 'apartments', 'auth'));
    }

    public function store(StoreTenantRequest $request)
    {
        abort_unless(\Gate::allows('tenant_create'), 403);

        $tenant = Tenant::create($request->all());
        $tenant->properties()->sync($request->input('properties', []));
        $tenant->apartments()->sync($request->input('apartments', []));

        return redirect()->route('admin.tenants.index');
    }

    public function edit(Tenant $tenant)
    {
        abort_unless(\Gate::allows('tenant_edit'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $apartments = ProductTag::all()->pluck('name', 'id');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tenant->load('properties', 'apartments', 'created_by', 'updated_by');

        return view('admin.tenants.edit', compact('properties', 'apartments', 'created_bies', 'tenant'));
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        abort_unless(\Gate::allows('tenant_edit'), 403);

        $tenant->update($request->all());
        $tenant->properties()->sync($request->input('properties', []));
        $tenant->apartments()->sync($request->input('apartments', []));

        return redirect()->route('admin.tenants.index');
    }

    public function show(Tenant $tenant)
    {
        abort_unless(\Gate::allows('tenant_show'), 403);

        $tenant->load('properties', 'apartments', 'created_by', 'updated_by');

        return view('admin.tenants.show', compact('tenant'));
    }

    public function destroy(Tenant $tenant)
    {
        abort_unless(\Gate::allows('tenant_delete'), 403);

        $tenant->delete();

        return back();
    }

    public function massDestroy(MassDestroyTenantRequest $request)
    {
        Tenant::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

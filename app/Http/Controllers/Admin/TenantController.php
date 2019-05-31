<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTenantRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Property;
use App\PropertyTag;
use App\Tenant;
use App\User;
use App\Vacancy;
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

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $apartments = PropertyTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.tenants.create', compact('properties', 'apartments','auth'));
    }

        public function getvacant($id = 0)
        {

            $vacantData = Tenant::getVacantApartment($id);
            // dd($vacantData);
            $checks = Tenant::all()->pluck('apartment_id');
            foreach ($vacantData as $vacantdata) {
              $tag[] = PropertyTag::findorFail($vacantdata->property_tag_id);
            }
            // dd($tag);
            $data = [];
            foreach ($tag as $key => $value) {
              if (isset($checks)) {
                foreach ($checks as $check) {
                  if ($check!=$value->id) {
                    $data[] = ['id' => $value->id, 'name' => $value->name];
                  }
                }
                // return response()->json($data);
              }
              $data[] = ['id' => $value->id, 'name' => $value->name];
            }
            // dd($data);
            return response()->json($data);
        }

        public function store(StoreTenantRequest $request)
        {
            abort_unless(\Gate::allows('tenant_create'), 403);

            $tenant = Tenant::create($request->all());

            return redirect()->route('admin.tenants.index');
        }

        public function edit(Tenant $tenant)
        {
            abort_unless(\Gate::allows('tenant_edit'), 403);

            $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $apartments = PropertyTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $tenant->load('property', 'apartment', 'created_by', 'updated_by');

            return view('admin.tenants.edit', compact('properties', 'apartments', 'created_bies', 'tenant'));
        }

        public function update(UpdateTenantRequest $request, Tenant $tenant)
        {
            abort_unless(\Gate::allows('tenant_edit'), 403);

            $tenant->update($request->all());

            return redirect()->route('admin.tenants.index');
        }

        public function show(Tenant $tenant)
        {
            abort_unless(\Gate::allows('tenant_show'), 403);

            $tenant->load('property', 'apartment', 'created_by', 'updated_by');

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

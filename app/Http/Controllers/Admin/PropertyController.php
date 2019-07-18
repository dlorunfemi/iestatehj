<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPropertyRequest;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Landlord;
use App\Property;
use App\PropertyCategory;
use App\User;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('property_access'), 403);

        $properties = Property::all();

        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('property_create'), 403);

        $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property_types = PropertyCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $officers = User::whereHas('roles', function($q){
                      $q->where('title', 'officer');
                  })->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.properties.create', compact('landlords', 'property_types', 'officers', 'auth'));
    }

        public function store(StorePropertyRequest $request)
        {
            abort_unless(\Gate::allows('property_create'), 403);

            $property = Property::create($request->all());

            return redirect()->route('admin.properties.index');
        }

        public function edit(Property $property)
        {
            abort_unless(\Gate::allows('property_edit'), 403);

            $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $property_types = PropertyCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $officers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $auth = Auth::user();
            // $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $property->load('landlord', 'property_type', 'officer', 'created_by', 'updated_by');

            return view('admin.properties.edit', compact('landlords', 'property_types', 'officers', 'auth', 'property'));
        }

        public function update(UpdatePropertyRequest $request, Property $property)
        {
            abort_unless(\Gate::allows('property_edit'), 403);

            $property->update($request->all());

            return redirect()->route('admin.properties.index');
        }

        public function show(Property $property)
        {
            abort_unless(\Gate::allows('property_show'), 403);

            $property->load('landlord', 'property_type', 'officer', 'created_by', 'updated_by');

            return view('admin.properties.show', compact('property'));
        }

        public function destroy(Property $property)
        {
            abort_unless(\Gate::allows('property_delete'), 403);

            $property->delete();

            return back();
        }

        public function massDestroy(MassDestroyPropertyRequest $request)
        {
            Property::whereIn('id', request('ids'))->delete();

            return response(null, 204);
        }
    }

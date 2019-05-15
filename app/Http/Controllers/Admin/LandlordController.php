<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLandlordRequest;
use App\Http\Requests\StoreLandlordRequest;
use App\Http\Requests\UpdateLandlordRequest;
use App\Landlord;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;

class LandlordController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('landlord_access'), 403);

        $landlords = Landlord::all();

        return view('admin.landlords.index', compact('landlords'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('landlord_create'), 403);

        $officers = User::whereHas('roles', function($q){
                      $q->where('title', 'officer');
                  })->get()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        // $officers = User::all(Role::whereTitle('Officer'))->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        // $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.landlords.create', compact('officers', 'created_bies', 'auth'));
    }

    public function store(StoreLandlordRequest $request)
    {
        abort_unless(\Gate::allows('landlord_create'), 403);

        $landlord = Landlord::create($request->all());

        return redirect()->route('admin.landlords.index');
    }

    public function edit(Landlord $landlord)
    {
        abort_unless(\Gate::allows('landlord_edit'), 403);

        $officers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $landlord->load('officer', 'created_by', 'updated_by');

        return view('admin.landlords.edit', compact('officers', 'created_bies', 'landlord'));
    }

    public function update(UpdateLandlordRequest $request, Landlord $landlord)
    {
        abort_unless(\Gate::allows('landlord_edit'), 403);

        $landlord->update($request->all());

        return redirect()->route('admin.landlords.index');
    }

    public function show(Landlord $landlord)
    {
        abort_unless(\Gate::allows('landlord_show'), 403);

        $landlord->load('officer', 'created_by', 'updated_by');

        return view('admin.landlords.show', compact('landlord'));
    }

    public function destroy(Landlord $landlord)
    {
        abort_unless(\Gate::allows('landlord_delete'), 403);

        $landlord->delete();

        return back();
    }

    public function massDestroy(MassDestroyLandlordRequest $request)
    {
        Landlord::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequistionRequest;
use App\Http\Requests\StoreRequistionRequest;
use App\Http\Requests\UpdateRequistionRequest;
use App\Product;
use App\Requistion;
use App\User;

class RequistionController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('requistion_access'), 403);

        $requistions = Requistion::all();

        return view('admin.requistions.index', compact('requistions'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('requistion_create'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $initiating_staffs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requistions.create', compact('properties', 'initiating_staffs'));
    }

    public function store(StoreRequistionRequest $request)
    {
        abort_unless(\Gate::allows('requistion_create'), 403);

        $requistion = Requistion::create($request->all());
        $requistion->properties()->sync($request->input('properties', []));

        return redirect()->route('admin.requistions.index');
    }

    public function edit(Requistion $requistion)
    {
        abort_unless(\Gate::allows('requistion_edit'), 403);

        $properties = Product::all()->pluck('name', 'id');

        $initiating_staffs = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requistion->load('properties', 'initiating_staff', 'return_user');

        return view('admin.requistions.edit', compact('properties', 'initiating_staffs', 'requistion'));
    }

    public function update(UpdateRequistionRequest $request, Requistion $requistion)
    {
        abort_unless(\Gate::allows('requistion_edit'), 403);

        $requistion->update($request->all());
        $requistion->properties()->sync($request->input('properties', []));

        return redirect()->route('admin.requistions.index');
    }

    public function show(Requistion $requistion)
    {
        abort_unless(\Gate::allows('requistion_show'), 403);

        $requistion->load('properties', 'initiating_staff', 'return_user');

        return view('admin.requistions.show', compact('requistion'));
    }

    public function destroy(Requistion $requistion)
    {
        abort_unless(\Gate::allows('requistion_delete'), 403);

        $requistion->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequistionRequest $request)
    {
        Requistion::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

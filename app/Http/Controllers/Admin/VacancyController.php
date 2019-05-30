<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyVacancyRequest;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Property;
use App\PropertyTag;
use App\User;
use App\Vacancy;
use Illuminate\Support\Facades\Auth;

class VacancyController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('vacancy_access'), 403);

        $vacancies = Vacancy::all();

        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('vacancy_create'), 403);

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property_tags = PropertyTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        return view('admin.vacancies.create', compact('properties', 'property_tags', 'auth'));
    }

    public function store(StoreVacancyRequest $request)
    {
        abort_unless(\Gate::allows('vacancy_create'), 403);

        $vacancy = Vacancy::create($request->all());

        return redirect()->route('admin.vacancies.index');
    }

    public function edit(Vacancy $vacancy)
    {
        abort_unless(\Gate::allows('vacancy_edit'), 403);

        $properties = Property::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $property_tags = PropertyTag::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $auth = Auth::user();

        $vacancy->load('property', 'property_tag', 'created_by', 'updated_by');

        return view('admin.vacancies.edit', compact('properties', 'property_tags', 'auth', 'vacancy'));
    }

    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        abort_unless(\Gate::allows('vacancy_edit'), 403);

        $vacancy->update($request->all());

        return redirect()->route('admin.vacancies.index');
    }

    public function show(Vacancy $vacancy)
    {
        abort_unless(\Gate::allows('vacancy_show'), 403);

        $vacancy->load('property', 'property_tag', 'created_by', 'updated_by');

        return view('admin.vacancies.show', compact('vacancy'));
    }

    public function destroy(Vacancy $vacancy)
    {
        abort_unless(\Gate::allows('vacancy_delete'), 403);

        $vacancy->delete();

        return back();
    }

    public function massDestroy(MassDestroyVacancyRequest $request)
    {
        Vacancy::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

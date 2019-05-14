<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Vacancy;

class VacancyApiController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::all();

        return $vacancies;
    }

    public function store(StoreVacancyRequest $request)
    {
        return Vacancy::create($request->all());
    }

    public function update(UpdateVacancyRequest $request, Vacancy $vacancy)
    {
        return $vacancy->update($request->all());
    }

    public function show(Vacancy $vacancy)
    {
        return $vacancy;
    }

    public function destroy(Vacancy $vacancy)
    {
        return $vacancy->delete();
    }
}

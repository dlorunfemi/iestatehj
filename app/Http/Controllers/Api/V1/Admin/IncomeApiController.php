<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Income;

class IncomeApiController extends Controller
{
    public function index()
    {
        $incomes = Income::all();

        return $incomes;
    }

    public function store(StoreIncomeRequest $request)
    {
        return Income::create($request->all());
    }

    public function update(UpdateIncomeRequest $request, Income $income)
    {
        return $income->update($request->all());
    }

    public function show(Income $income)
    {
        return $income;
    }

    public function destroy(Income $income)
    {
        return $income->delete();
    }
}

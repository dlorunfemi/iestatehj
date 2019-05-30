<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;
use App\IncomeCategory;

class IncomeCategoryApiController extends Controller
{
    public function index()
    {
        $incomeCategories = IncomeCategory::all();

        return $incomeCategories;
    }

    public function store(StoreIncomeCategoryRequest $request)
    {
        return IncomeCategory::create($request->all());
    }

    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        return $incomeCategory->update($request->all());
    }

    public function show(IncomeCategory $incomeCategory)
    {
        return $incomeCategory;
    }

    public function destroy(IncomeCategory $incomeCategory)
    {
        return $incomeCategory->delete();
    }
}

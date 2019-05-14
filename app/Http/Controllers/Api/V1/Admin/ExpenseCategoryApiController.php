<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;

class ExpenseCategoryApiController extends Controller
{
    public function index()
    {
        $expenseCategories = ExpenseCategory::all();

        return $expenseCategories;
    }

    public function store(StoreExpenseCategoryRequest $request)
    {
        return ExpenseCategory::create($request->all());
    }

    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        return $expenseCategory->update($request->all());
    }

    public function show(ExpenseCategory $expenseCategory)
    {
        return $expenseCategory;
    }

    public function destroy(ExpenseCategory $expenseCategory)
    {
        return $expenseCategory->delete();
    }
}

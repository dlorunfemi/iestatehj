<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Expense;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseApiController extends Controller
{
    public function index()
    {
        $expenses = Expense::all();

        return $expenses;
    }

    public function store(StoreExpenseRequest $request)
    {
        return Expense::create($request->all());
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        return $expense->update($request->all());
    }

    public function show(Expense $expense)
    {
        return $expense;
    }

    public function destroy(Expense $expense)
    {
        return $expense->delete();
    }
}

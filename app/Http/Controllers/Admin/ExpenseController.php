<?php

namespace App\Http\Controllers\Admin;

use App\Expense;
use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;

class ExpenseController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('expense_access'), 403);

        $expenses = Expense::all();

        return view('admin.expenses.index', compact('expenses'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('expense_create'), 403);

        $expense_categories = ExpenseCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expenses.create', compact('expense_categories'));
    }

    public function store(StoreExpenseRequest $request)
    {
        abort_unless(\Gate::allows('expense_create'), 403);

        $expense = Expense::create($request->all());

        return redirect()->route('admin.expenses.index');
    }

    public function edit(Expense $expense)
    {
        abort_unless(\Gate::allows('expense_edit'), 403);

        $expense_categories = ExpenseCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expense->load('expense_category');

        return view('admin.expenses.edit', compact('expense_categories', 'expense'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        abort_unless(\Gate::allows('expense_edit'), 403);

        $expense->update($request->all());

        return redirect()->route('admin.expenses.index');
    }

    public function show(Expense $expense)
    {
        abort_unless(\Gate::allows('expense_show'), 403);

        $expense->load('expense_category');

        return view('admin.expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        abort_unless(\Gate::allows('expense_delete'), 403);

        $expense->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseRequest $request)
    {
        Expense::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

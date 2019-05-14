<?php

namespace App\Http\Controllers\Admin;

use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenseCategoryRequest;
use App\Http\Requests\StoreExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;

class ExpenseCategoryController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('expense_category_access'), 403);

        $expenseCategories = ExpenseCategory::all();

        return view('admin.expenseCategories.index', compact('expenseCategories'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('expense_category_create'), 403);

        return view('admin.expenseCategories.create');
    }

    public function store(StoreExpenseCategoryRequest $request)
    {
        abort_unless(\Gate::allows('expense_category_create'), 403);

        $expenseCategory = ExpenseCategory::create($request->all());

        return redirect()->route('admin.expense-categories.index');
    }

    public function edit(ExpenseCategory $expenseCategory)
    {
        abort_unless(\Gate::allows('expense_category_edit'), 403);

        return view('admin.expenseCategories.edit', compact('expenseCategory'));
    }

    public function update(UpdateExpenseCategoryRequest $request, ExpenseCategory $expenseCategory)
    {
        abort_unless(\Gate::allows('expense_category_edit'), 403);

        $expenseCategory->update($request->all());

        return redirect()->route('admin.expense-categories.index');
    }

    public function show(ExpenseCategory $expenseCategory)
    {
        abort_unless(\Gate::allows('expense_category_show'), 403);

        return view('admin.expenseCategories.show', compact('expenseCategory'));
    }

    public function destroy(ExpenseCategory $expenseCategory)
    {
        abort_unless(\Gate::allows('expense_category_delete'), 403);

        $expenseCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseCategoryRequest $request)
    {
        ExpenseCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

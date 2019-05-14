<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncomeCategoryRequest;
use App\Http\Requests\StoreIncomeCategoryRequest;
use App\Http\Requests\UpdateIncomeCategoryRequest;
use App\IncomeCategory;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('income_category_access'), 403);

        $incomeCategories = IncomeCategory::all();

        return view('admin.incomeCategories.index', compact('incomeCategories'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('income_category_create'), 403);

        return view('admin.incomeCategories.create');
    }

    public function store(StoreIncomeCategoryRequest $request)
    {
        abort_unless(\Gate::allows('income_category_create'), 403);

        $incomeCategory = IncomeCategory::create($request->all());

        return redirect()->route('admin.income-categories.index');
    }

    public function edit(IncomeCategory $incomeCategory)
    {
        abort_unless(\Gate::allows('income_category_edit'), 403);

        return view('admin.incomeCategories.edit', compact('incomeCategory'));
    }

    public function update(UpdateIncomeCategoryRequest $request, IncomeCategory $incomeCategory)
    {
        abort_unless(\Gate::allows('income_category_edit'), 403);

        $incomeCategory->update($request->all());

        return redirect()->route('admin.income-categories.index');
    }

    public function show(IncomeCategory $incomeCategory)
    {
        abort_unless(\Gate::allows('income_category_show'), 403);

        return view('admin.incomeCategories.show', compact('incomeCategory'));
    }

    public function destroy(IncomeCategory $incomeCategory)
    {
        abort_unless(\Gate::allows('income_category_delete'), 403);

        $incomeCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeCategoryRequest $request)
    {
        IncomeCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

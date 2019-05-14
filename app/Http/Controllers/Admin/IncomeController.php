<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIncomeRequest;
use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Income;
use App\IncomeCategory;

class IncomeController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('income_access'), 403);

        $incomes = Income::all();

        return view('admin.incomes.index', compact('incomes'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('income_create'), 403);

        $income_categories = IncomeCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.incomes.create', compact('income_categories'));
    }

    public function store(StoreIncomeRequest $request)
    {
        abort_unless(\Gate::allows('income_create'), 403);

        $income = Income::create($request->all());

        return redirect()->route('admin.incomes.index');
    }

    public function edit(Income $income)
    {
        abort_unless(\Gate::allows('income_edit'), 403);

        $income_categories = IncomeCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $income->load('income_category');

        return view('admin.incomes.edit', compact('income_categories', 'income'));
    }

    public function update(UpdateIncomeRequest $request, Income $income)
    {
        abort_unless(\Gate::allows('income_edit'), 403);

        $income->update($request->all());

        return redirect()->route('admin.incomes.index');
    }

    public function show(Income $income)
    {
        abort_unless(\Gate::allows('income_show'), 403);

        $income->load('income_category');

        return view('admin.incomes.show', compact('income'));
    }

    public function destroy(Income $income)
    {
        abort_unless(\Gate::allows('income_delete'), 403);

        $income->delete();

        return back();
    }

    public function massDestroy(MassDestroyIncomeRequest $request)
    {
        Income::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

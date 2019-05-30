<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPropertyCategoryRequest;
use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\PropertyCategory;

class PropertyCategoryController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('property_category_access'), 403);

        $propertyCategories = PropertyCategory::all();

        return view('admin.propertyCategories.index', compact('propertyCategories'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('property_category_create'), 403);

        return view('admin.propertyCategories.create');
    }

    public function store(StorePropertyCategoryRequest $request)
    {
        abort_unless(\Gate::allows('property_category_create'), 403);

        $propertyCategory = PropertyCategory::create($request->all());

        return redirect()->route('admin.property-categories.index');
    }

    public function edit(PropertyCategory $propertyCategory)
    {
        abort_unless(\Gate::allows('property_category_edit'), 403);

        return view('admin.propertyCategories.edit', compact('propertyCategory'));
    }

    public function update(UpdatePropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        abort_unless(\Gate::allows('property_category_edit'), 403);

        $propertyCategory->update($request->all());

        return redirect()->route('admin.property-categories.index');
    }

    public function show(PropertyCategory $propertyCategory)
    {
        abort_unless(\Gate::allows('property_category_show'), 403);

        return view('admin.propertyCategories.show', compact('propertyCategory'));
    }

    public function destroy(PropertyCategory $propertyCategory)
    {
        abort_unless(\Gate::allows('property_category_delete'), 403);

        $propertyCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyCategoryRequest $request)
    {
        PropertyCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyCategoryRequest;
use App\Http\Requests\UpdatePropertyCategoryRequest;
use App\PropertyCategory;

class PropertyCategoryApiController extends Controller
{
    public function index()
    {
        $propertyCategories = PropertyCategory::all();

        return $propertyCategories;
    }

    public function store(StorePropertyCategoryRequest $request)
    {
        return PropertyCategory::create($request->all());
    }

    public function update(UpdatePropertyCategoryRequest $request, PropertyCategory $propertyCategory)
    {
        return $propertyCategory->update($request->all());
    }

    public function show(PropertyCategory $propertyCategory)
    {
        return $propertyCategory;
    }

    public function destroy(PropertyCategory $propertyCategory)
    {
        return $propertyCategory->delete();
    }
}

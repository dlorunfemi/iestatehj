<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\ProductCategory;

class ProductCategoryApiController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all();

        return $productCategories;
    }

    public function store(StoreProductCategoryRequest $request)
    {
        return ProductCategory::create($request->all());
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        return $productCategory->update($request->all());
    }

    public function show(ProductCategory $productCategory)
    {
        return $productCategory;
    }

    public function destroy(ProductCategory $productCategory)
    {
        return $productCategory->delete();
    }
}

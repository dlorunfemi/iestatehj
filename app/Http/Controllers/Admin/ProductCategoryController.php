<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductCategoryRequest;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('product_category_access'), 403);

        $productCategories = ProductCategory::all();

        return view('admin.productCategories.index', compact('productCategories'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('product_category_create'), 403);

        return view('admin.productCategories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        abort_unless(\Gate::allows('product_category_create'), 403);

        $productCategory = ProductCategory::create($request->all());

        return redirect()->route('admin.product-categories.index');
    }

    public function edit(ProductCategory $productCategory)
    {
        abort_unless(\Gate::allows('product_category_edit'), 403);

        return view('admin.productCategories.edit', compact('productCategory'));
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productCategory)
    {
        abort_unless(\Gate::allows('product_category_edit'), 403);

        $productCategory->update($request->all());

        return redirect()->route('admin.product-categories.index');
    }

    public function show(ProductCategory $productCategory)
    {
        abort_unless(\Gate::allows('product_category_show'), 403);

        return view('admin.productCategories.show', compact('productCategory'));
    }

    public function destroy(ProductCategory $productCategory)
    {
        abort_unless(\Gate::allows('product_category_delete'), 403);

        $productCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductCategoryRequest $request)
    {
        ProductCategory::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

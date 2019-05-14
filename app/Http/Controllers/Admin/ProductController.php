<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Landlord;
use App\Product;
use App\ProductCategory;
use App\User;

class ProductController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('product_access'), 403);

        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('product_create'), 403);

        $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProductCategory::all()->pluck('name', 'id');

        $officers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.products.create', compact('landlords', 'categories', 'officers', 'created_bies'));
    }

    public function store(StoreProductRequest $request)
    {
        abort_unless(\Gate::allows('product_create'), 403);

        $product = Product::create($request->all());
        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $landlords = Landlord::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $categories = ProductCategory::all()->pluck('name', 'id');

        $officers = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $product->load('landlord', 'categories', 'officer', 'created_by', 'updated_by');

        return view('admin.products.edit', compact('landlords', 'categories', 'officers', 'created_bies', 'product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        abort_unless(\Gate::allows('product_edit'), 403);

        $product->update($request->all());
        $product->categories()->sync($request->input('categories', []));

        return redirect()->route('admin.products.index');
    }

    public function show(Product $product)
    {
        abort_unless(\Gate::allows('product_show'), 403);

        $product->load('landlord', 'categories', 'officer', 'created_by', 'updated_by');

        return view('admin.products.show', compact('product'));
    }

    public function destroy(Product $product)
    {
        abort_unless(\Gate::allows('product_delete'), 403);

        $product->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

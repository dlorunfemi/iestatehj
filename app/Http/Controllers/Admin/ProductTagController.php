<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProductTagRequest;
use App\Http\Requests\StoreProductTagRequest;
use App\Http\Requests\UpdateProductTagRequest;
use App\ProductTag;

class ProductTagController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('product_tag_access'), 403);

        $productTags = ProductTag::all();

        return view('admin.productTags.index', compact('productTags'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('product_tag_create'), 403);

        return view('admin.productTags.create');
    }

    public function store(StoreProductTagRequest $request)
    {
        abort_unless(\Gate::allows('product_tag_create'), 403);

        $productTag = ProductTag::create($request->all());

        return redirect()->route('admin.product-tags.index');
    }

    public function edit(ProductTag $productTag)
    {
        abort_unless(\Gate::allows('product_tag_edit'), 403);

        return view('admin.productTags.edit', compact('productTag'));
    }

    public function update(UpdateProductTagRequest $request, ProductTag $productTag)
    {
        abort_unless(\Gate::allows('product_tag_edit'), 403);

        $productTag->update($request->all());

        return redirect()->route('admin.product-tags.index');
    }

    public function show(ProductTag $productTag)
    {
        abort_unless(\Gate::allows('product_tag_show'), 403);

        return view('admin.productTags.show', compact('productTag'));
    }

    public function destroy(ProductTag $productTag)
    {
        abort_unless(\Gate::allows('product_tag_delete'), 403);

        $productTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyProductTagRequest $request)
    {
        ProductTag::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

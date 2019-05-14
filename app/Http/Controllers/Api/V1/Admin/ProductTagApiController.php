<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductTagRequest;
use App\Http\Requests\UpdateProductTagRequest;
use App\ProductTag;

class ProductTagApiController extends Controller
{
    public function index()
    {
        $productTags = ProductTag::all();

        return $productTags;
    }

    public function store(StoreProductTagRequest $request)
    {
        return ProductTag::create($request->all());
    }

    public function update(UpdateProductTagRequest $request, ProductTag $productTag)
    {
        return $productTag->update($request->all());
    }

    public function show(ProductTag $productTag)
    {
        return $productTag;
    }

    public function destroy(ProductTag $productTag)
    {
        return $productTag->delete();
    }
}

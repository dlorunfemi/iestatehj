<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyTagRequest;
use App\Http\Requests\UpdatePropertyTagRequest;
use App\PropertyTag;

class PropertyTagApiController extends Controller
{
    public function index()
    {
        $propertyTags = PropertyTag::all();

        return $propertyTags;
    }

    public function store(StorePropertyTagRequest $request)
    {
        return PropertyTag::create($request->all());
    }

    public function update(UpdatePropertyTagRequest $request, PropertyTag $propertyTag)
    {
        return $propertyTag->update($request->all());
    }

    public function show(PropertyTag $propertyTag)
    {
        return $propertyTag;
    }

    public function destroy(PropertyTag $propertyTag)
    {
        return $propertyTag->delete();
    }
}

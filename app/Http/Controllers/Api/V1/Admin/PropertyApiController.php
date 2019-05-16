<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Property;

class PropertyApiController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return $properties;
    }

    public function store(StorePropertyRequest $request)
    {
        return Property::create($request->all());
    }

    public function update(UpdatePropertyRequest $request, Property $property)
    {
        return $property->update($request->all());
    }

    public function show(Property $property)
    {
        return $property;
    }

    public function destroy(Property $property)
    {
        return $property->delete();
    }
}

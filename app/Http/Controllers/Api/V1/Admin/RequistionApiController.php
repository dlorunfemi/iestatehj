<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRequistionRequest;
use App\Http\Requests\UpdateRequistionRequest;
use App\Requistion;

class RequistionApiController extends Controller
{
    public function index()
    {
        $requistions = Requistion::all();

        return $requistions;
    }

    public function store(StoreRequistionRequest $request)
    {
        return Requistion::create($request->all());
    }

    public function update(UpdateRequistionRequest $request, Requistion $requistion)
    {
        return $requistion->update($request->all());
    }

    public function show(Requistion $requistion)
    {
        return $requistion;
    }

    public function destroy(Requistion $requistion)
    {
        return $requistion->delete();
    }
}

<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLandlordRequest;
use App\Http\Requests\UpdateLandlordRequest;
use App\Landlord;

class LandlordApiController extends Controller
{
    public function index()
    {
        $landlords = Landlord::all();

        return $landlords;
    }

    public function store(StoreLandlordRequest $request)
    {
        return Landlord::create($request->all());
    }

    public function update(UpdateLandlordRequest $request, Landlord $landlord)
    {
        return $landlord->update($request->all());
    }

    public function show(Landlord $landlord)
    {
        return $landlord;
    }

    public function destroy(Landlord $landlord)
    {
        return $landlord->delete();
    }
}

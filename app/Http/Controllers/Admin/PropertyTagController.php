<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPropertyTagRequest;
use App\Http\Requests\StorePropertyTagRequest;
use App\Http\Requests\UpdatePropertyTagRequest;
use App\PropertyTag;

class PropertyTagController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('property_tag_access'), 403);

        $propertyTags = PropertyTag::all();

        return view('admin.propertyTags.index', compact('propertyTags'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('property_tag_create'), 403);

        return view('admin.propertyTags.create');
    }

    public function store(StorePropertyTagRequest $request)
    {
        abort_unless(\Gate::allows('property_tag_create'), 403);

        $propertyTag = PropertyTag::create($request->all());

        return redirect()->route('admin.property-tags.index');
    }

    public function edit(PropertyTag $propertyTag)
    {
        abort_unless(\Gate::allows('property_tag_edit'), 403);

        return view('admin.propertyTags.edit', compact('propertyTag'));
    }

    public function update(UpdatePropertyTagRequest $request, PropertyTag $propertyTag)
    {
        abort_unless(\Gate::allows('property_tag_edit'), 403);

        $propertyTag->update($request->all());

        return redirect()->route('admin.property-tags.index');
    }

    public function show(PropertyTag $propertyTag)
    {
        abort_unless(\Gate::allows('property_tag_show'), 403);

        return view('admin.propertyTags.show', compact('propertyTag'));
    }

    public function destroy(PropertyTag $propertyTag)
    {
        abort_unless(\Gate::allows('property_tag_delete'), 403);

        $propertyTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyPropertyTagRequest $request)
    {
        PropertyTag::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

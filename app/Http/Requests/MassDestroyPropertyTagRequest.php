<?php

namespace App\Http\Requests;

use App\PropertyTag;
use Gate;
use Illuminate\Foundation\Http\FormRequest;

class MassDestroyPropertyTagRequest extends FormRequest
{
    public function authorize()
    {
        return abort_if(Gate::denies('property_tag_delete'), 403, '403 Forbidden') ?? true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:property_tags,id',
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\PropertyTag;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyTagRequest extends FormRequest
{
    public function authorize()
    {
        return \Gate::allows('property_tag_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'required',
            ],
        ];
    }
}

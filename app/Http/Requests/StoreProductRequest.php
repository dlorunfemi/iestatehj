<?php

// namespace App\Http\Requests;

// use App\Property;
// use Illuminate\Foundation\Http\FormRequest;

// class StorePropertyRequest extends FormRequest
// {
//     public function authorize()
//     {
//         return \Gate::allows('property_create');
//     }

//     public function rules()
//     {
//         return [
//             'landlord_id'   => [
//                 'required',
//                 'integer',
//             ],
//             'categories.*'  => [
//                 'integer',
//             ],
//             'categories'    => [
//                 'required',
//                 'array',
//             ],
//             'is_new'        => [
//                 'required',
//             ],
//             'name'          => [
//                 'required',
//             ],
//             'state'         => [
//                 'required',
//             ],
//             'is_bank'       => [
//                 'required',
//             ],
//             'is_dormant'    => [
//                 'required',
//             ],
//             'officer_id'    => [
//                 'required',
//                 'integer',
//             ],
//             'created_by_id' => [
//                 'required',
//                 'integer',
//             ],
//         ];
//     }
// }

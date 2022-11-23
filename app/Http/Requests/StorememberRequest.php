<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorememberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|min:3|max:100',
            'avatar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'subgroup_id'=>'required|exists:subgroups,id',
            'details'=>'required|min:3|max:100',
        ];
    }
}

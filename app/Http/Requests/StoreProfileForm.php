<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileForm extends FormRequest
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
            'nickname' => 'required|max:20|string',
            'height' => 'nullable|numeric|max:250|min:50',
            'gender' => 'required',
            'comment ' =>'nullable|max:500',
            'work' => 'nullable|max:30',
            'interest' => 'nullable|max:30',
            'age' => 'required|numeric|min:18|max:120'

        ];
    }
}

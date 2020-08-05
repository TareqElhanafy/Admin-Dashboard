<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateClientRequest extends FormRequest
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
            'title'=>'string',
            'description'=>'string',
            'status'=>'string',
            'phone'=>'required|string',
            'contract_start_date'=>'required|date',
            'contract_end_date'=>'required|date',
        ];
    }
}

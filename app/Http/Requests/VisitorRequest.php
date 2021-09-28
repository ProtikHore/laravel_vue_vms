<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:30',
            'address' => 'required',
            'email' => 'required',
            'mobile_number' => 'required',
            'where_from' => 'required',
            'where_to' => 'required',
            'purpose' => 'required',
            'company_name' => 'required',
            //'visitor_card_id' => 'required',
        ];
    }
}

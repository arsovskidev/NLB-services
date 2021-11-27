<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
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
            'client_id' => 'required',
            'account_number' => 'required',
            'credit_card_number' => 'required',
            'balance_eur' => 'required'
        ];
    }

    public function messages()
    {
        return [
            '*.required' => `Enter custom message here and/or add more messages bellow, and if you want add more types of rules aside from "required".`
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'company_name' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
            'st' => 'required|string',
            'phone_number' => 'required|string',
            'fax' => 'required|string',
            'website' => 'required|string',
            'name' => 'required|string',
            'labour' => 'required|string',
            'parts' => 'required|string',
            'service_fee' => 'required|string',
            'due_date' => 'required|string',
        ];
    }
}

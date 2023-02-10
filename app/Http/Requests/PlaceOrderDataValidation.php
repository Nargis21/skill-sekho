<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PlaceOrderDataValidation extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'phone_contact' => ['required', 'regex:/^(?:\+88)?01[15-9]\d{8}$/'],
            'phone_emergency' => ['required', 'different:phone_contact', 'regex:/^(?:\+88)?01[15-9]\d{8}$/'],
            'course_type' => 'required',
            'transaction_id' => 'required|unique:orders,transaction_id,'
        ];
    }
    public function messages()
    {
        return [
            'phone_contact.required' => "Phone Number is Required!",
            'phone_emergency.required' => "Emergency Phone Number is Required!",
            'transaction_id.required' => "Transaction ID is Required!",
            'phone_contact.regex' => "Please Provide a Valid Phone Number",
            'phone_emergency.regex' => "Please Provide a Valid Phone Number",
            'transaction_id.unique' => "Please Provide a Valid Transaction ID",
            'phone_emergency.different' => "Your emergency number should be different from your contact number.",
            'course_type.required' => 'Please Select Course Type'

        ];
    }
}

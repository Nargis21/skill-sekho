<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactInfoValidation extends FormRequest
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
             
            'address' => ['required'],
            'discount' => ['required'],
            'email1' => ['required', 'email'],
            'email2' => ['required', 'different:email1','email'],
            'phone1' => ['required', 'regex:/^(?:\+88)?01[15-9]\d{8}$/'],
            'phone2' => ['required', 'different:phone1', 'regex:/^(?:\+88)?01[15-9]\d{8}$/'],
            'bkash' => ['required', 'regex:/^(?:\+88)?01[15-9]\d{8}$/']
        ];
    }

    public function messages()
    {
        return [
            'address.required' => "Address is Required!",
            'discount.required' => "Discount is Required!",
            'phone1.required' => "Phone Number 1 is Required!",
            'phone2.required' => "Phone Number 2 is Required!",
            'email1.required' => "Email Address 1 is Required!",
            'email2.required' => "Email Address 2 is Required!",
            'phone1.regex' => "Please Provide a Valid Phone Number",
            'phone2.regex' => "Please Provide a Valid Phone Number",
            'phone2.different' => "Phone Number 1 should be different from Phone Number 2.",
            'email2.different' => "Email Address 1 should be different from Email Address 2.",
        ];
    }
}

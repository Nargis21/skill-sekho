<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormValidation extends FormRequest
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
            'name' => 'required',
            'email' => 'required',
            'number' => ['required', 'regex:/^(?:\+88)?01[15-9]\d{8}$/'],
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Name is Required!",
            'email.required' => "Email is Required!",
            'message.required' => "Message is Required!",
            'number.required' => "Phone Number is Required!",
            'number.regex' => "Please Provide a Valid Phone Number",
        ];
    }
}

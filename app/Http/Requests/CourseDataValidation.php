<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseDataValidation extends FormRequest
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
            'course_name' => 'required|unique:courses,course_name',
            'course_category' => 'required',
            'course_title' => 'required',
            'course_description' => 'required',
            'course_duration' => 'required',
            'price' => 'required',
            'created_by' => 'required',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,jfif|max:2048',

        ];
    }

    public function messages()
    {
        return [
            'course_name.required' => "Course Name is Required!",
            'course_name.unique' => "Course already exist!",
            'course_category.required' => "Course Category is Required!",
            'course_title.required' => "Course Title is Required!",
            'course_description.required' => "Course Description is Required!",
            'course_duration.required' => "Course Duration is Required!",
            'price.required' => "Course Price is Required!",
            'created_by.required' => "Course Author is Required!",
            'banner_image.required' => "Course Banner Image is Required!",
        ];
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseDataValidation;
use App\Http\Requests\UpdateCourseDataValidation;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Image;

class CourseController extends Controller
{
    public function course()
    {
        $allCategory = Category::all();
        return view('dashboard.course.add_course', compact('allCategory'));
    }

    public function addCourse(CourseDataValidation $request)
    {
        $image = $request->file('banner_image');
        $imageExt = strtolower($image->getClientOriginalExtension());
        $name_gen = hexdec(uniqid()) . '.' . $imageExt;
        Image::make($image)->resize(300, 200)->save('upload/course_images/' . $name_gen);

        $save_url = 'upload/course_images/' . $name_gen;

        Course::insert([
            'course_name' => $request->course_name,
            'course_category' => $request->course_category,
            'course_title' => $request->course_title,
            'course_description' => $request->course_description,
            'course_duration' => $request->course_duration,
            'price' => $request->price,
            'created_by' => $request->created_by,
            'banner_image' => $save_url
        ]);

        $notifications = array(
            'message' => 'Course Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.course')->with($notifications);
    }

    public function manageCourse()
    {
        $allCourse = Course::all();
        return view('dashboard.course.manage_course', compact('allCourse'));
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $oldImage = $course->banner_image;
        unlink($oldImage);

        Course::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function editCourse($id)
    {
        $course = Course::find($id);
        return view('dashboard.course.edit_course', compact('course'));
    }

    public function updateCourse(UpdateCourseDataValidation $request){
        $course_id = $request->id;
        if($request->file('banner_image')){

            $image = $request->file('banner_image');
            $imageExt = strtolower($image->getClientOriginalExtension());
            $name_gen = hexdec(uniqid()) . '.' . $imageExt;
            Image::make($image)->resize(300, 200)->save('upload/course_images/' . $name_gen);

            $course = Course::findOrFail($course_id);
            $oldImage = $course->banner_image;
            unlink($oldImage);
            
    
            $save_url = 'upload/course_images/' . $name_gen;
    
            Course::findOrFail($request->id)->update([
                'course_name' => $request->course_name,
                'course_category' => $request->course_category,
                'course_title' => $request->course_title,
                'course_description' => $request->course_description,
                'course_duration' => $request->course_duration,
                'price' => $request->price,
                'created_by' => $request->created_by,
                'banner_image' => $save_url
            ]);
    
            $notifications = array(
                'message' => 'Course Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notifications);
        }else{
            Course::findOrFail($request->id)->update([
                'course_name' => $request->course_name,
                'course_category' => $request->course_category,
                'course_title' => $request->course_title,
                'course_description' => $request->course_description,
                'course_duration' => $request->course_duration,
                'price' => $request->price,
                'created_by' => $request->created_by
            ]);
    
            $notifications = array(
                'message' => 'Course Updated Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('manage.course')->with($notifications);
        }
    }

    public function deactivateCourse($id)
    {
        Course::findOrFail($id)->update([
            'status' => '1'
        ]);

        $notifications = array(
            'message' => 'Course Deactivated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.course')->with($notifications);
    }

    public function activateCourse($id)
    {
        Course::findOrFail($id)->update([
            'status' => '2'
        ]);

        $notifications = array(
            'message' => 'Course Activated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.course')->with($notifications);
    }

    public function allCourses(){
        $courses = Course::where('status', '=', '2')->orderBy('id', 'desc')->simplePaginate(8);
        return view('frontend.course.all_courses', compact('courses'));
    }

    public function showCourses($category_name){
        $category = $category_name;
        $courses = Course::where([
            ['course_category', '=', $category_name],
            ['status', '=', '2'],
        ])->orderBy('id', 'desc')->simplePaginate(8);
        return view('frontend.course.courses', compact('courses', 'category'));
    }

    public function courseDetails($course_id){
       
        $course = Course::findOrFail($course_id);
        return view('frontend.course.course_details', compact('course'));
    }
}

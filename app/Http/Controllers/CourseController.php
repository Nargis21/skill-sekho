<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseDataValidation;
use App\Http\Requests\UpdateCourseDataValidation;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use Image;
use Illuminate\Http\Response;

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
        $allCourse = Course::orderBy('id', 'desc')->get();
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

    public function updateCourse(UpdateCourseDataValidation $request)
    {
        $course_id = $request->id;
        if ($request->file('banner_image')) {

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
        } else {
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

    public function allCourses()
    {
        $courses = Course::where('status', '=', '2')->orderBy('id', 'desc')->paginate(8);
        return view('frontend.course.all_courses', compact('courses'));
    }

    public function showCourses($category_name)
    {
        $category = $category_name;
        $courses = Course::where([
            ['course_category', '=', $category_name],
            ['status', '=', '2'],
        ])->orderBy('id', 'desc')->paginate(8);
        return view('frontend.course.courses', compact('courses', 'category'));
    }

    public function courseDetails($course_id)
    {

        $course = Course::findOrFail($course_id);
        return view('frontend.course.course_details', compact('course'));
    }

    public function schedule()
    {
        $allCourses = Course::all();
        return view('dashboard.course.add_schedule', compact('allCourses'));
    }

    public function addSchedule(Request $request)
    {
        $request->validate([
            'course_schedule' => 'required|mimes:jpeg,png,jpg,gif,svg,jfif,pdf|max:2048',
        ], [
            'course_schedule.required' => "Please Upload Course Schedule"
        ]);

        $image = $request->file('course_schedule');
        $imageExt = strtolower($image->getClientOriginalExtension());
        $name_gen = hexdec(uniqid()) . '.' . $imageExt;
        $image->move(public_path('upload/course_schedule'),$name_gen);


        $course = Course::where('course_name', $request->course_name)->first();
        $oldImage = $course->course_schedule;
        if ($oldImage != null) {
            unlink($oldImage);
        }


        $save_url = 'upload/course_schedule/' . $name_gen;

        Course::where('course_name', $request->course_name)->update([
            'course_schedule' => $save_url
        ]);

        $notifications = array(
            'message' => 'Schedule Uploaded Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.schedule')->with($notifications);
    }

    public function manageSchedule()
    {
        $allCourse = Course::whereNotNull('course_schedule')->orderBy('id', 'desc')->get();
        return view('dashboard.course.manage_schedule', compact('allCourse'));
    }

    public function editSchedule($id)
    {
        $course = Course::find($id);
        return view('dashboard.course.edit_schedule', compact('course'));
    }

    public function updateSchedule(Request $request)
    {
        $request->validate([
            'course_schedule' => 'required|mimes:jpeg,png,jpg,gif,svg,jfif,pdf|max:2048',
        ], [
            'course_schedule.required' => "Please Upload Course Schedule"
        ]);

        $image = $request->file('course_schedule');
        $imageExt = strtolower($image->getClientOriginalExtension());
        $name_gen = hexdec(uniqid()) . '.' . $imageExt;
        $image->move(public_path('upload/course_schedule'),$name_gen);


        $course = Course::findOrFail($request->id);
        $oldImage = $course->course_schedule;
        unlink($oldImage);

        $save_url = 'upload/course_schedule/' . $name_gen;

        Course::findOrFail($request->id)->update([
            'course_schedule' => $save_url
        ]);

        $notifications = array(
            'message' => 'Schedule Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.schedule')->with($notifications);
    }

    public function deleteSchedule($id)
    {
        $course = Course::findOrFail($id);
        $oldImage = $course->course_schedule;
        unlink($oldImage);

        Course::findOrFail($id)->update([
            'course_schedule' => Null
        ]);

        return redirect()->route('manage.schedule');
    }

    public function pdfView($id){
        $course = Course::findOrFail($id);
        if ($course) {
            $file = public_path( $course->course_schedule);
            if (file_exists($file)) {
                $headers = [
                    'Content-Type' => 'application/pdf',
                ];
                return response()->file($file, $headers);
            } else {
                return response()->json(['error' => 'File not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Course not found'], 404);
        }
    
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderDataValidation;
use App\Models\Course;
use App\Models\Order;
use Carbon\Carbon;
use App\Mail\PlaceOrder;
use App\Mail\ApprovedOrder;
use Mail;
use Auth;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function checkout($id)
    {
        $course = Course::findOrFail($id);
        return view('frontend.course.checkout', compact('course'));
    }

    public function placeOrder(PlaceOrderDataValidation $request)
    {
        Order::insert([
            'user_email' => $request->user_email,
            'course_name' => $request->course_name,
            'amount' => $request->amount,
            'phone_contact' => $request->phone_contact,
            'phone_emergency' => $request->phone_emergency,
            'transaction_id' => $request->transaction_id,
            'course_type' => $request->course_type,
            'created_at' => Carbon::now()
        ]);

        //send email when new category added 
        $courseName = $request->course_name;
        Mail::to(Auth::user()->email)->send(new PlaceOrder($courseName));

        $notifications = array(
            'message' => 'Course Order Placed Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('my.courses')->with($notifications);
    }

    public function myCourses()
    {
        $courses = Order::withTrashed()->where('user_email', '=', auth()->user()->email)->orderBy('id', 'desc')->get();
        return view('dashboard.order.my_courses', compact('courses'));
    }

    public function pendingOrders()
    {
        $orders = Order::where('status', '=', 'pending')->orderBy('id', 'desc')->get();
        return view('dashboard.order.pending_orders', compact('orders'));
    }

    public function approveOrder($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'approved',
            'approved_at' => Carbon::now()
        ]);

        //send email when new category added 
        $order = Order::findOrFail($order_id);
        $courseName = $order->course_name;
        $userEmail = $order->user_email;
        Mail::to($userEmail)->send(new ApprovedOrder($courseName));

        $notifications = array(
            'message' => 'Course Approved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('approved.orders')->with($notifications);
    }

    public function approvedOrders()
    {
        $orders = Order::where('status', '=', 'approved')->orderBy('id', 'desc')->get();
        return view('dashboard.order.approved_orders', compact('orders'));
    }

    public function trashOrder($order_id)
    {
        Order::findOrFail($order_id)->delete();

        $notifications = array(
            'message' => 'Order history moved to trash!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notifications);
    }

    public function trashedOrders()
    {
        $orders =  Order::onlyTrashed()->orderBy('id', 'desc')->get();
        return view('dashboard.order.trashed_orders', compact('orders'));
    }

    public function restoreOrder($order_id)
    {
        Order::withTrashed()->find($order_id)->restore();

        $notifications = array(
            'message' => 'Order History Restored!',
            'alert-type' => 'success'
        );
        return redirect()->route('approved.orders')->with($notifications);
    }

    public function startCourse($course_name)
    {
        return view('frontend.course.start_course', compact('course_name'));
    }

    public function downloadFile($course_name)
    {
        $course = Course::where('course_name',$course_name)->first();
        $file = public_path($course->course_schedule);

        return response()->download($file);
    }
}

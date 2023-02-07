<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceOrderDataValidation;
use App\Models\Course;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'created_at' => Carbon::now()
        ]);
        $notifications = array(
            'message' => 'Course Order Placed Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('my.courses')->with($notifications);
    }

    public function myCourses()
    {
        $courses = Order::withTrashed()->where('user_email', '=', auth()->user()->email)->get();
        return view('dashboard.order.my_courses', compact('courses'));
    }

    public function pendingOrders()
    {
        $orders = Order::where('status', '=', 'pending')->get();
        return view('dashboard.order.pending_orders', compact('orders'));
    }

    public function approveOrder($order_id)
    {
        Order::findOrFail($order_id)->update([
            'status' => 'approved',
            'approved_at' => Carbon::now()
        ]);

        $notifications = array(
            'message' => 'Course Approved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('approved.orders')->with($notifications);
    }

    public function approvedOrders()
    {
        $orders = Order::where('status', '=', 'approved')->get();
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
        $orders =  Order::onlyTrashed()->get();
        return view('dashboard.order.trashed_orders', compact('orders'));
    }

    public function restoreOrder($order_id){
        Order::withTrashed()->find($order_id)->restore();

        $notifications = array(
            'message' => 'Order History Restored!',
            'alert-type' => 'success'
        );
        return redirect()->route('approved.orders')->with($notifications);
    }

    public function startCourse($course_name){
     return view('frontend.course.start_course',compact('course_name'));
    }
}

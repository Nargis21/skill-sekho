@extends('frontend.main_master')
@section('main_content')

@php
use App\Models\ContactInformation;
 $contactInfo = ContactInformation::find(1);
use App\Models\Order;
$order = Order::where([
['course_name', '=', $course->course_name],
['user_email', '=', auth()->user()->email],
])->get();
@endphp

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-5 p-5">
            <div class="card">
                <img src="{{ url($course->banner_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-title fw-bold fs-4 text-black p-0 m-0">{{ $course->course_name }}</p>
                    <div class="d-flex align-items-center">
                        <img width="22px" src="https://img.icons8.com/ios-filled/50/null/empty-hourglass.png" />
                        <p class="pt-3 ps-2">{{ $course->course_duration }}</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img width="23px" src="https://img.icons8.com/ios-filled/50/null/meta.png" />
                        <p class="pt-3 ps-2">Full lifetime access</p>
                    </div>

                    <div class="d-flex align-items-center">
                        <img width="25px" src="https://img.icons8.com/ios-filled/50/null/trophy.png" />
                        <p class="pt-3 ps-2">Certificate of completion</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <img width="25px" src="https://img.icons8.com/external-bearicons-glyph-bearicons/64/null/external-Taka-currency-bearicons-glyph-bearicons.png" />
                        <p class="pt-3 ps-2">{{ $course->price }}</p>
                    </div>
                </div>
            </div>
        </div>
        @if(count($order) == 0)
        <div class="col-12 col-md-12 col-lg-7 p-5">
            <div class="d-flex align-items-center">
                <p class="mt-3 me-2 fs-2 fw-bold text-black">Get TK.<span class="text-warning">{{ $contactInfo->discount }}</span> Discount for Online Payment</p>
                <img width="30px" src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
            </div>

            <p class="p-0 m-0 fs-4 text-black">You need to pay <mark class="fw-bold">BDT. {{ $course->price - $contactInfo->discount }}</mark> <span class="text-secondary">(<s>BDT. {{ $course->price }}</s>)</span></p>
            <p class="py-2 m-0 fs-5  text-black">Please pay at bkash merchant number <mark class="fw-bold">{{ $contactInfo->phone1 }}</mark> </p>
            <div class="card w-75 my-3">
                <div class="card-header text-black fs-5 fw-bold">
                    Fillup the Form after Payment Complete
                </div>
                <form method="post" action="{{ route('place.order') }}" class="p-3">
                    @csrf
                    <input type="hidden" name="user_email" value="{{ Auth::user()->email }}">
                    <input type="hidden" name="course_name" value="{{ $course->course_name }}">
                    <input type="hidden" name="amount" value="{{ $course->price - $contactInfo->discount }}">
                    <div class="form-group ">
                        <label class="mb-2 text-black" for="exampleInputEmail1">Phone Number (Active)</label>

                        <input name="phone_contact" type="text" class="form-control" placeholder="+880 *** *** **72" value="{{ old('phone_contact')}}">

                        @error('phone_contact')
                        <div class="text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="my-2 text-black" for="exampleInputPassword1">Emergency Phone Number</label>
                        <input name="phone_emergency" type="text" class="form-control" placeholder="+880 *** *** **21" value="{{ old('phone_emergency')}}">
                        @error('phone_emergency')
                        <div class="text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="my-2 text-black" for="exampleInputPassword1">Transaction ID (bkash only)</label>
                        <input name="transaction_id" type="phone" class="form-control" placeholder="TX42O6X032C1" value="{{ old('transaction_id')}}">
                        @error('transaction_id')
                        <div class="text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="my-2 text-black" for="exampleInputPassword1">Course Type</label><br>
                        <input type="radio" name="course_type" value="Online">
                        <span class="me-2">Online</span>
                        <input type="radio" name="course_type" value="Offline">
                        <span>Offline</span>
                        @error('course_type')
                        <div class="text-danger mt-2">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn mt-3">SUBMIT</button>
                </form>

            </div>

        </div>
        @else
        <div class="col-12 col-md-12 col-lg-7 p-5">
            <div class="text-center">
            <p class="my-3 fs-1 fw-bold text-black">You Have Already Enrolled!</p>
            <p class="fs-4 text-black">You have already purchased <span class="text-primary">{{ $course->course_name }}</span> course.</p>
                <a href="{{ route('my.courses') }}" class="btn mt-2">Learn Now</a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
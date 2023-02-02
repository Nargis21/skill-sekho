@extends('frontend.main_master')
@section('main_content')

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-8 p-5">
            <p class="fw-bold fs-2 text-black p-0 m-0">{{ $course->course_name }}</p>
            <p class="p-0 m-0 text-black fs-5 ">{{ $course->course_title }}</p>
            <small>Created By <span class="text-primary fw-bold">{{ $course->created_by }}</span></small>
            <div class="border p-3 mt-3">
                <p class="fw-bold fs-4 text-black p-0 m-0">What you'll learn</p>

                {!! $course->course_description !!}

            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 p-5">
            <div class="card">
                <img src="{{ url($course->banner_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
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
                   
                    <div class=" mb-3 mx-auto">

                        <a href="{{ route('checkout',$course->id) }}" class="btn">Enroll Now</a>

                    </div>
              
                </div>

            </div>
        </div>
    </div>
</div>

@endsection
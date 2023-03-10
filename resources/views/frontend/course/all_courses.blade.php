@extends('frontend.main_master')
@section('main_content')

<div class="container my-5 py-5">

    <p class="mt-5 text-center fs-2 fw-bold text-black">Boots You Career With <span class="text-warning">Right Stack</span> </p>

    @if(count($courses) == 0)
    <div class="d-flex justify-content-center my-5 py-5">
        <p class="alert alert-danger w-25 text-center">No Course Uploaded Yet!</p>
    </div>
    @else
    <div class="row row-cols-1 row-cols-md-4 g-4 my-4">
        @foreach($courses as $course)
        <div class="col">
            <div class="card h-100">
                <img src="{{ url($course->banner_image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-title fw-bold fs-5 text-black">{{ $course->course_name }}</p>
                    <small class="card-text">{{ $course->created_by }}</small>
                    <p class="card-title fw-bold fs-5 text-black">BDT. {{ $course->price }}</p>
                </div>
                <div class=" mb-3 mx-3 d-flex justify-content-end">
                    <small>
                        <a href="{{ route('course.details',$course->id) }}" class="text-decoration-underline fw-bold">See More <img width="15px" src="https://img.icons8.com/plumpy/24/null/long-arrow-right.png"/></a>
                    </small>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center pt-4">
    {{ $courses->links() }}
    </div>
    @endif
</div>
@endsection
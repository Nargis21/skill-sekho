@php
use App\Models\Category;
use App\Models\Course;
$allCategory = Category::where('status', '2')->get();
$allCourses = Course::where('status', '=', '2')->orderBy('id', 'desc')->take(4)->get();
@endphp

<div class="container my-5 py-5">
    <nav class="container mt-5">
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All</button>

            @foreach($allCategory as $category)
            <button class="nav-link" id="{{ $category->id }}" data-bs-toggle="tab" data-bs-target="#nav-{{ $category->id }}" type="button" role="tab" aria-controls="nav-{{ $category->id }}" aria-selected="false">{{ $category->category_name }}</button>
            @endforeach
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container">
                @if(count($allCourses) == 0)
                <div class="d-flex justify-content-center my-5 py-5">
                    <p class="alert alert-danger w-25 text-center">No Course Uploaded Yet!</p>
                </div>
                @else
                <div class="row row-cols-1 row-cols-md-4 g-4 my-4">
                    @foreach($allCourses as $course)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ url($course->banner_image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="card-title fw-bold fs-5 text-black">{{ $course->course_name }}</p>
                                <small class="card-text">{{ $course->created_by }}</small>
                                <p class="card-title fw-bold fs-5 text-black">BDT. {{ $course->price }}</p>
                            </div>
                            <div class=" mb-3 mx-3">
                                <small>
                                    <a href="{{ route('course.details',$course->id) }}" class="text-decoration-underline fw-bold">See More</a>
                                </small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn " href="{{ route('all.courses') }}">Explore More</a>
                </div>
        </div>

        @foreach($allCategory as $category)
        <div class="tab-pane fade" id="nav-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-{{ $category->id }}-tab">

            @php
            $courses = Course::where([
            ['course_category', '=', $category->category_name],
            ['status', '=', '2']])->orderBy('id', 'desc')->take(4)->get();
           
            @endphp

            <div class="container row row-cols-1 row-cols-md-4 g-4 my-4">
                @foreach($courses as $course)
                <div class="col">
                    <div class="card h-100">
                        <img src="{{ url($course->banner_image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-title fw-bold fs-5 text-black">{{ $course->course_name }}</p>
                            <small class="card-text">{{ $course->created_by }}</small>
                            <p class="card-title fw-bold fs-5 text-black">BDT. {{ $course->price }}</p>
                        </div>
                        <div class=" mb-3 mx-3">
                            <small>
                                <a href="{{ route('course.details', $course->id) }}" class="text-decoration-underline fw-bold">See More</a>
                            </small>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="d-flex justify-content-center">
                <a class="btn " href="{{ route('show.courses',$category->category_name) }}">Explore More</a>
                </div>
        </div>
        @endforeach
    </div>
</div>

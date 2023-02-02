@extends('dashboard.dashboard_master')
@section('main_content')

@php
use App\Models\Category;
$allCategory = Category::all();
$durations = ['1 Month','2 Months','3 Months','4 Months','5 Months','6 Months',] 
@endphp

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Update Course</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('update.course') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Course Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="course_name" value="{{ $course->course_name}}">
                                    @error('course_name')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select name="course_category" class="form-control form-select">
                                        @foreach($allCategory as $category)
                                        @if($category->category_name == $course->course_category)
                                        <option selected value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @else
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('course_category')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Course Title</label>
                                <div class="col-sm-10">
                                    <textarea name="course_title" class="form-control" maxlength="225" rows="3">
                                    {{ $course->course_title }}
                                    </textarea>
                                    @error('course_title')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Course Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="course_description" class="form-control" maxlength="225" rows="3"> {{ $course->course_description }}
                                    </textarea>
                                    @error('course_description')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Course Duration</label>
                                <div class="col-sm-10">
                                <select name="course_duration" class="form-control form-select">
                                        @foreach($durations as $duration)
                                        @if($duration == $course->course_duration)
                                        <option selected value="{{ $duration }}">{{ $duration }}</option>
                                        @else
                                        <option value="{{ $duration }}">{{ $duration }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    @error('course_duration')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" name="price" value="{{ $course->price}}">
                                    @error('price')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>

                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Created By</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="created_by" value="{{ $course->created_by}}">
                                    @error('created_by')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Banner Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" accept="image/*" type="file" id="image" name="banner_image">
                                    @error('banner_image')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                    @if(session('course_banner_image_error'))
                                    <p class="text-danger mt-2">{{session('course_banner_image_error')}}</p>
                                    @endif
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url($course->banner_image) }}" alt="Course Banner Image">
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Course" class="btn btn-info waves-effect waves-light" />

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
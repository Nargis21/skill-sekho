@extends('dashboard.dashboard_master')
@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Update Schedule</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form method="post" action="{{ route('update.schedule') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $course->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Upload Schedule</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="course_schedule">
                                    @error('course_schedule')
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
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url($course->course_schedule) }}" alt="Course Banner Image">
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Schedule" class="btn btn-info waves-effect waves-light" />

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
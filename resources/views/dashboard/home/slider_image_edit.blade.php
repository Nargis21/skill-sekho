@extends('dashboard.dashboard_master')
@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Slider Image - {{ $sliderImage->slider_name }} </h4>

                        <form method="post" action="{{ route('slider.image.update') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $sliderImage->id }}">

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="slider_image">
                                    @error('slider_image')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ url($sliderImage->slider_image) }}" alt="Slider Image">
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Slider Image" class="btn btn-info waves-effect waves-light" />

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
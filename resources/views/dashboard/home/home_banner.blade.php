@extends('dashboard.dashboard_master')
@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Home Banner</h4>

                        <form method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homeBanner->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name="title" value="{{ $homeBanner->title }}">
                                    @error('title')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <textarea name="short_title" class="form-control" maxlength="225" rows="3">
                                    {{ $homeBanner->short_title }}
                                    </textarea>
                                    @error('short_title')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Video URL</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="video_url" name="video_url" value="{{ $homeBanner->video_url }}">
                                    @error('video_url')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Banner Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="banner_image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg" id="showImage" src="{{ (!empty($homeBanner->banner_image)) ? url($homeBanner->banner_image) : url('upload/no_image.jpg') }}" alt="Banner Image">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Banner" class="btn btn-info waves-effect waves-light" />

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
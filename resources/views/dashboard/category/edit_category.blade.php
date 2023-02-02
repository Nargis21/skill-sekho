@extends('dashboard.dashboard_master')
@section('main_content')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Category</h4>

                        <form method="post" action="{{ route('update.category') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="image" name="category_name" value="{{ $category->category_name }}">
                                    @error('category_name')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Category" class="btn btn-info waves-effect waves-light" />

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
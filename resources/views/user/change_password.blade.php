@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Change Password</h4>

                        @if(count($errors))
                        @foreach($errors->all() as $error )
                        <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>
                        @endforeach
                        @endif

                        @if(session('password_change'))
                        <p class="alert alert-danger">{{session('password_change')}}</p>
                        @endif

                        <form method="post" action="{{ route('updatePassword') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="oldPassword" name="oldPassword">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="newPassword" name="newPassword">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="confirmPassword" name="confirmPassword">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Password" class="btn btn-info waves-effect waves-light" />

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center>
                        <img class="rounded-circle avatar-xl mt-4" src="{{ (!empty($userData->profile_image)) ? url('upload/profile_images/'.$userData->profile_image) : url('upload/profile_images/avatar.png') }}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $userData->name }}</h4>
                        <hr>
                        <h4 class="card-title">Email : {{ $userData->email }}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{ $userData->username }}</h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>



@endsection
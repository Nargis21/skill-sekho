@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-11">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img class="rounded avatar-md w-full" src="{{ (!empty($user->profile_image)) ? url('upload/profile_images/'.$user->profile_image) : url('upload/profile_images/avatar.png') }}"  alt="">
                                    </td>
                                    <td>
                                        <p>{{ $user->username }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $user->phone }}</p>
                                    </td>
                                   
                                    <td>
                                        <p>{{ $user->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        @if($user->role == '2')
                                        <p class="text-primary fw-bold"><i class="fas fa-user-shield"></i> Admin</p>
                                        @elseif($user->role == '3')
                                        <p class="text-primary fw-bold"><i class="fas fa-crown"></i> Super Admin</p>
                                        @else
                                        <p class="text-primary fw-bold"><i class="fas fa-user-check"></i> User</p>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($user->role == '2')
                                        <a href="{{ route('remove.admin',$user->id) }}" class="btn btn-danger sm " title="Edit Data">
                                            Remove Admin
                                        </a>
                                        @elseif($user->role == '3')
                                       <p class="text-primary fw-bold"><i class="fas fa-crown"></i> Super Admin</p>
                                        @else
                                        <a href="{{ route('make.admin',$user->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            Make Admin
                                        </a>
                                        @endif
                                    </td>
                            
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>

@endsection
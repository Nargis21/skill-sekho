@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Course</h4>
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
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Duration</th>
                                    <th>Price</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Action </th>
                                    <th>Title</th>
                                    <th>Description</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($allCourse as $course)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img class="rounded avatar-md w-full" src="{{ url($course->banner_image) }}" alt="">
                                    </td>
                                    <td>
                                        <p>{{ $course->course_name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->course_category }}</p>
                                    </td>
                                   
                                    <td>
                                        <p>{{ $course->course_duration }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->price }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->created_by }}</p>
                                    </td>
                                    <td>
                                        @if($course->status == '2')
                                        <a href="{{ route('deactivate.course',$course->id) }}" class="btn btn-danger sm " title="Edit Data">
                                            Deactivate
                                        </a>
                                        @else
                                        <a href="{{ route('activate.course',$course->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            Activate
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                        <a href="{{ route('edit.course',$course->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.course',$course->id) }}" class="btn btn-danger sm " id="delete" title="Delete Data">
                                            <i class=" fas fa-trash-alt"></i>
                                        </a>
                                        </div>
                                    </td>
                                      <td>
                                        <p>{{ $course->course_title }}</p>
                                    </td>
                                    <td>
                                        <p>{!! $course->course_description !!}</p>
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
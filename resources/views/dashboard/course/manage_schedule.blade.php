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
                                    <th>Schedule</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($allCourse as $course)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @php
                                        $extension = pathinfo($course->course_schedule, PATHINFO_EXTENSION);
                                        @endphp
                                        @if($extension == 'pdf' || $extension == 'PDF' )
                                        <a href="{{ route('pdf.view',$course->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            View File
                                        </a>
                                        @else
                                        <img class="rounded avatar-md w-full" src="{{ url($course->course_schedule) }}" alt="">
                                        @endif
                                    </td>
                                    <td>
                                        <p>{{ $course->course_name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->course_category }}</p>
                                    </td>


                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('edit.schedule',$course->id) }}" class="btn btn-primary sm " title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('delete.schedule',$course->id) }}" class="btn btn-danger sm " id="delete" title="Delete Data">
                                                <i class=" fas fa-trash-alt"></i>
                                            </a>
                                        </div>
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
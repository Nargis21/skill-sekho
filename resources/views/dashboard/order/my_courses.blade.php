@extends('dashboard.dashboard_master')
@section('main_content')
@php
use App\Models\Course;
@endphp

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">My Courses</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Course Name</th>
                                    <th>Course Type</th>
                                    <th>Amount</th>
                                    <th>Transaction ID</th>
                                    <th>Enrolled Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($courses as $course)
                                @php
                                $schedule = Course::where('course_name',$course->course_name)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <p>{{ $course->course_name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->course_type }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->amount }}</p>
                                    </td>

                                    <td>
                                        <p>{{ $course->transaction_id }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $course->created_at->format('d/m/Y h:i:s A') }}</p>
                                    </td>
                                    <td>
                                        @if($course->status == 'approved')
                                        @if($course->course_type == 'Online')
                                        <a href="{{ route('start.course',$course->course_name) }}" class="btn btn-primary ">
                                            Start Course
                                        </a>
                                        @else


                                        @if(!empty($schedule->course_schedule))
                                        <a href="{{ route('download',$course->course_name) }}" class="btn btn-primary d-flex gap-2 align-items-center">
                                            <i class="fas fa-download"></i> Schedule
                                        </a>
                                        @else
                                        <a href="{{ route('download',$course->course_name) }}" class="btn btn-primary disabled d-flex gap-2 align-items-center">
                                            <i class="fas fa-download"></i> Schedule
                                        </a>

                                        @endif

                                        @endif
                                        @else
                                        <p class="alert alert-danger mx-auto text-center" title="Edit Data">
                                            Pending
                                        </p>
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
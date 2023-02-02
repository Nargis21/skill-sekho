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
                                    <th>Slider Name</th>
                                    <th>Title</th>
                                    <th>Sub Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($sliderContents as $sliderContent)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $sliderContent->slider_name }}</td>
                                    <td>
                                        <p>{{ $sliderContent->title }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $sliderContent->sub_title }}</p>
                                    </td>

                                    <td>
                                        <p>{{ $sliderContent->description }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $sliderContent->category }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-1">
                                            <a href="{{ route('slider.content.edit',$sliderContent->id) }}" class="btn btn-primary sm " title="Edit Data">
                                                <i class="fas fa-edit"></i>
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
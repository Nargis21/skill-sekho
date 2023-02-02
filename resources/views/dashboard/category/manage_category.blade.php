@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Manage Category</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Category Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($allCategory as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <p>{{ $category->category_name }}</p>
                                    </td>
                                    <td>
                                        @if($category->status == '2')
                                        <a href="{{ route('deactivate.category',$category->id) }}" class="btn btn-danger sm " title="Edit Data">
                                            Deactivate
                                        </a>
                                        @else
                                        <a href="{{ route('activate.category',$category->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            Activate
                                        </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.category',$category->id) }}" class="btn btn-primary sm " title="Edit Data">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('delete.category',$category->id) }}" class="btn btn-danger sm " id="delete" title="Delete Data">
                                            <i class=" fas fa-trash-alt"></i>
                                        </a>
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
@extends('dashboard.dashboard_master')
@section('main_content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Approved Orders</h4>
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
                                    <th>User Email</th>
                                    <th>Course Name</th>
                                    <th>Amount</th>
                                    <th>Transaction ID</th>
                                    <th>Approved Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <p>{{ $order->user_email }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $order->course_name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $order->amount }}</p>
                                    </td>

                                    <td>
                                        <p>{{ $order->transaction_id }}</p>
                                    </td>
                                    <td>
                                        @php
                                        $dateTime = new DateTime($order->approved_at);
                                        @endphp
                                        <p>{{ $dateTime->format('d/m/Y h:i:s A') }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ route('restore.order',$order->id) }}" class="btn btn-primary sm " title="Restore Data">
                                            <i class="  fas fa-trash-restore-alt"></i>
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
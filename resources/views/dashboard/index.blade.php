@extends('dashboard.dashboard_master')
@section('main_content')

@php
use App\Models\Order;
use App\Models\User;
$sales = Order::withTrashed()->where('status', 'approved')->get();
$newOrders = Order::where('status', 'pending')->get();
$users = User::all();
$approvedCourses = Order::withTrashed()->where([['user_email', '=', auth()->user()->email],['status', '=','approved']])->get();
$pendingCourses = Order::withTrashed()->where([['user_email', '=', auth()->user()->email],['status', '=','pending']])->get();

@endphp

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-7 col-12">
                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_ymyikn6l.json" background="transparent" speed="2" style=" height: 450px;" loop autoplay></lottie-player>
            </div>
            <div class="col-xl-5 col-12 mt-5">
                <div class="row ">
                    @if(Auth::user()->role == '2')
                    <div class="col-xl-12 col-md-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                        <h4 class="mb-2">{{ count($sales) }}</h4>
                                        <!-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p> -->
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class="ri-shopping-cart-2-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-12 col-md-12 ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">New Orders</p>
                                        <h4 class="mb-2">{{ count($newOrders) }}</h4>
                                        <!-- <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p> -->
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-success rounded-3">
                                            <i class="mdi mdi-currency-usd font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <p class="text-truncate font-size-14 mb-2">Total Users</p>
                                        <h4 class="mb-2">{{ count($users) }}</h4>
                                        <!-- <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p> -->
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-primary rounded-3">
                                            <i class="ri-user-3-line font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    @else
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="mb-2">Approved Course</h4>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-info rounded-3">
                                            <i class="fas fa-book-reader font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                              
                                <p class="mt-3 fs-5 fw-bold "><i class="fas fa-check-circle fs-4  text-primary mr-2"></i> You have <mark>{{ count($approvedCourses) }}</mark> Approved @if(count($approvedCourses) <= 1)Course @else Courses @endif</p>
                             
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    <div class="col-xl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="">
                                        <h4 class="mb-2">Pending Course</h4>
                                    </div>
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-light text-info rounded-3">
                                            <i class="fas fa-book-reader font-size-24"></i>
                                        </span>
                                    </div>
                                </div>
                              
                                <p class="mt-3 fs-5 fw-bold "><i class="fas fa-clock fs-4  text-danger mr-2"></i> You have <mark>{{ count($pendingCourses) }}</mark> Pending @if(count($pendingCourses) <= 1)Course @else Courses @endif</p>
                             
                            </div><!-- end cardbody -->
                        </div><!-- end card -->
                    </div><!-- end col -->
                    @endif
                </div><!-- end row -->
            </div>
        </div>
    </div>

</div>

@endsection
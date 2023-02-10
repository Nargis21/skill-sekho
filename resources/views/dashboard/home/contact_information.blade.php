@extends('dashboard.dashboard_master')
@section('main_content')


<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Contact Information</h4>

                        <form method="post" action="{{ route('update.contact.info') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea name="address" class="form-control" maxlength="225" rows="3">
                                    {{ $contactInfo->address}}
                                    </textarea>
                                    @error('address')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email Address 1</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email1" value="{{ $contactInfo->email1 }}">
                                    @error('email1')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Email Address 2</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" name="email2" value="{{ $contactInfo->email2 }}">
                                    @error('email2')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Phone Number 1</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phone1" value="{{ $contactInfo->phone1 }}">
                                    @error('phone1')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Phone Number 2</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="phone2" value="{{ $contactInfo->phone2 }}">
                                    @error('phone2')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Bkash Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="bkash" value="{{ $contactInfo->bkash }}">
                                    @error('bkash')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Discount</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="discount" value="{{ $contactInfo->discount }}">
                                    @error('discount')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Information" class="btn btn-info waves-effect waves-light" />

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
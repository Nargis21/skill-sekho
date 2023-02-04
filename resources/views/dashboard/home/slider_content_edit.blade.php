@extends('dashboard.dashboard_master')
@section('main_content')

@php
use App\Models\Category;
$activeCategory = Category::where('status', '2')->get();
$durations = ['1 Month','2 Months','3 Months','4 Months','5 Months','6 Months',]
@endphp

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-4">Update Slider Content - {{ $sliderContent->slider_name }}</h4>

                        <form method="post" action="{{ route('slider.content.update',$sliderContent->id) }}">
                            @csrf

                            <input type="hidden" name="id" value="{{ $sliderContent->id }}">
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Category</label>
                                <div class="col-sm-10">
                                    <select name="category" class="form-control form-select">
                                        @foreach($activeCategory as $category)
                                        @if($category->category_name == $sliderContent->category)
                                        <option selected value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @else
                                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{ $sliderContent->title }}">
                                    @error('title')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Sub Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="sub_title" value="{{ $sliderContent->sub_title }}">
                                    @error('sub_title')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control" maxlength="225" rows="3">
                                    {{ $sliderContent->description }}
                                    </textarea>

                                    @error('description')
                                    <div class="text-danger mt-2">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Slider Content" class="btn btn-info waves-effect waves-light" />

                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

@endsection
 @extends('frontend.main_master')
 @section('main_content')
 <!-- banner-area -->
 @include('frontend.home.banner')
 <!-- banner-area-end -->

 <!-- tabs-area -->
 @include('frontend.home.tabs')
 <!-- tabs-area-end -->

 <!-- first-slider-area -->
 @include('frontend.home.first_slider')
 <!-- first-slider-area-end -->

 <!-- second-slider-area -->
 @include('frontend.home.second_slider')
 <!-- second-slider-area-end -->

 <!-- third-slider-area -->
 @include('frontend.home.third_slider')
 <!-- third-slider-area-end -->

 @endsection
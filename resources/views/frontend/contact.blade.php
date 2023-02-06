@extends('frontend.main_master')
@section('main_content')

<div class="container mt-5 pt-5">
    <section class="contact-info-area mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon01.png')}}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">address line</h4>
                            <span>CMPI, North Halishahar
                                Port Link Rd,<br> Chittagong 4216</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon02.png')}}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Phone Number</h4>
                            <span>+1255 - 568 - 6523</span>
                            <span>+1255 - 568 - 6523</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="contact__info">
                        <div class="contact__info__icon">
                            <img src="{{ asset('frontend/assets/img/icons/contact_icon03.png')}}" alt="">
                        </div>
                        <div class="contact__info__content">
                            <h4 class="title">Mail Address</h4>
                            <span>skill@sekho.com</span>
                            <span>info@skiillsekho.com</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-info-area-end -->

</div>
@endsection
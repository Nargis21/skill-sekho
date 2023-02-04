@php
use App\Models\HomeSlider\SliderContent;
$firstSlider = SliderContent::where('slider_name', 'Second Slider')->first();
$sliderImages = App\Models\HomeSlider\SliderImage::where('slider_name', 'Second Slider')->get();
@endphp

<section class="testimonial">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 order-0 order-lg-2">
                <ul class="about__icons__wrap">
                    @foreach($sliderImages as $item)
                    <li>
                        <img class="light" src="{{ asset($item->slider_image) }}" alt="XD">
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-5 col-lg-6">
                <div class="testimonial__wrap">
                    <div class="section__title">
                        <h3 class="title wow fadeInUp fs-1 lh-base" data-wow-delay=".2s">{{ $firstSlider->title }}</h3>
                    </div>
                    <div class="testimonial__active">
                        <div class="testimonial__item">
                            <div class="about__exp">
                                <div class="about__exp__icon">
                                    <img src="{{ asset('frontend/assets/img/icons/about_icon.png') }}" alt="">
                                </div>
                                <div class="about__exp__content">
                                    <p>{{ $firstSlider->sub_title }}</p>
                                </div>
                            </div>
                            <p class="desc">{{ $firstSlider->description }}</p>
                            <a href="{{ route('show.courses',$firstSlider->category) }}" class="btn">Explore Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
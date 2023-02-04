@php
use App\Models\HomeSlider\SliderContent;
$firstSlider = SliderContent::where('slider_name', 'Third Slider')->first();
$sliderImages = App\Models\HomeSlider\SliderImage::where('slider_name', 'Third Slider')->get();
@endphp

<section id="aboutSection" class="about">
     <div class="container">
         <div class="row align-items-center justify-content-center">
             <div class="col-lg-6">
                 <ul class="about__icons__wrap">
                    @foreach($sliderImages as $item)
                     <li>
                         <img class="light" src="{{ asset($item->slider_image) }}" alt="XD">
                     </li>
                   @endforeach
                 </ul>
             </div>
             <div class="col-lg-6">
                 <div class="about__content">
                     <div class="section__title">
                     <h3 class="title wow fadeInUp fs-1 lh-base" data-wow-delay=".2s">{{ $firstSlider->title }}</h3>
                        
                     </div>
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
 </section>
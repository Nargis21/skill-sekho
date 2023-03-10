@php
$homeBanner = App\Models\HomeBanner::find(1);
@endphp

<section class="banner">
     <div class="container custom-container">
         <div class="row align-items-center justify-content-center justify-content-lg-between">
             <div class="col-lg-6 order-0 order-lg-2">
                 <div class="banner__img text-center text-xxl-end">
                     <img src="{{ $homeBanner->banner_image }}" alt="">
                 </div>
             </div>
             <div class="col-xl-5 col-lg-6">
                 <div class="banner__content">
                     <h3 class="title wow fadeInUp fs-1 lh-base" data-wow-delay=".2s">{{ $homeBanner->title }}</h3>
                     <p class="wow fadeInUp p-0 m-0 mb-4" data-wow-delay=".4s">{{ $homeBanner->short_title }}</p>
                     <a href="{{ route('all.courses') }}" class="btn banner__btn wow fadeInUp" data-wow-delay=".6s">Explore Courses</a>
                 </div>
             </div>
         </div>
     </div>
     <div class="scroll__down">
         <a href="#aboutSection" class="scroll__link">Scroll down</a>
     </div>
     <div class="banner__video">
         <a href="{{ $homeBanner->video_url }}" class="popup-video"><i class="fas fa-play"></i></a>

 </section>
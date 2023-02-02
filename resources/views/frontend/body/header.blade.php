@php
use App\Models\Category;
$allCategory = Category::where('status', '2')->get();;
@endphp

<header>
    <div id="sticky-header" class="menu__area transparent-header shadow-lg py-0 my-0">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <nav class="menu__nav">
                            <div class="logo">
                                <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a>
                            </div>
                            <div class="navbar__wrap main__menu d-none d-xl-flex">
                                <ul class="navigation">
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="menu-item-has-children"><a href="#">Course Category</a>
                                        <ul class="sub-menu">
                                            @foreach($allCategory as $category)
                                            <li><a href="{{ route('show.courses',$category->category_name) }}">{{ $category->category_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="contact.html">contact me</a></li>
                                    @if(Auth::user())
                                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                    @endif
                                </ul>
                            </div>


                            @if(!Auth::user())

                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('login') }}" class="btn">Login</a>
                            </div>

                            @else

                            <img class="img-fluid rounded-circle me-2" height="50px" width="50px" src="{{ (!empty(Auth::user()->profile_image)) ? url('upload/profile_images/'.Auth::user()->profile_image) : url('upload/profile_images/avatar.png') }}" alt="Header Avatar">
                            <div class="header__btn d-none d-md-block">
                                <a href="{{ route('logout') }}" class="btn">Logout</a>
                            </div>
                            @endif


                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html" class="logo__black"><img src="{{ asset('frontend/assets/img/logo/logo_black.png') }}" alt=""></a>
                                <a href="index.html" class="logo__white"><img src="{{ asset('frontend/assets/img/logo/logo_white.png') }}" alt=""></a>
                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                                    <li><a href="#"><span class="fab fa-pinterest-p"></span></a></li>
                                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
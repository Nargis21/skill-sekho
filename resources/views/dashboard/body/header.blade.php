@php
$id = Auth::user()->id;
$userData = App\Models\User::find($id);
@endphp

<header id="page-topbar">
                <div class="navbar-header py-2 h-100">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="{{ url('/home') }}" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo_white.png') }}" alt="logo-sm" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo_black.png') }}" alt="logo-dark" height="70">
                                </span>
                            </a>

                            <a href="{{ url('/home') }}" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="{{ asset('backend/assets/images/logo_white.png') }}" alt="logo-sm-light" height="30">
                                </span>
                                <span class="logo-lg">
                                    <img src="{{ asset('backend/assets/images/logo_black.png') }}" alt="logo-light" height="60">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>

                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ (!empty($userData->profile_image)) ? url('upload/profile_images/'.$userData->profile_image) : url('upload/no_image.jpg') }}" 
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{ $userData->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>
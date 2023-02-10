<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title mt-3">My Account</li>
                <li>
                    <a href="{{ route('dashboard') }}" class="sub-menu">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('my.courses') }}" class="sub-menu">
                        <i class="fas fa-book-reader"></i>
                        <span>My Courses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile') }}" class="sub-menu">
                        <i class="fas fa-user"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-tools"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('changePassword') }}"><i class="fas fa-user-cog"></i> Change Password</a></li>
                    </ul>
                </li>

                @if(Auth::user()->role == '2' || Auth::user()->role == '3')
                <li class="menu-title">Frontend Setup</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-sliders-h"></i>
                        <span>Home Page Setup</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('home.banner') }}"><i class="fas fa-edit"></i>Update Banner</a></li>
                        <li><a href="{{ route('slider.content') }}"><i class="fas fa-edit"></i>Update Slider Content</a></li>
                        <li><a href="{{ route('slider.images') }}"><i class="fas fa-edit"></i>Update Slider Images</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('contact.info') }}" class="sub-menu">
                        <i class=" fas fa-tags"></i>
                        <span>Contact Information</span>
                    </a>
                </li>

                <li class="menu-title">Course & Category</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-th-list"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('category') }}"><i class="fas fa-plus"></i> Add Category</a></li>
                        <li><a href="{{ route('manage.category') }}"><i class="fas fa-tasks"></i> Manage Category</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-book-open"></i>
                        <span>Course</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('course') }}"><i class="fas fa-plus"></i> Add Course</a></li>
                        <li><a href="{{ route('manage.course') }}"><i class="fas fa-tasks"></i> Manage Course</a></li>
                    </ul>
                </li>
               
                <li class="menu-title">Order & Schedule</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fab fa-buffer"></i>
                        <span>Order</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('pending.orders') }}"><i class="fas fa-clock"></i> Pending Order</a></li>
                        <li><a href="{{ route('approved.orders') }}"><i class="fas fa-check-circle"></i> Approved Order</a></li>
                        <li><a href="{{ route('trashed.orders') }}"><i class="fas fa-trash-restore-alt"></i> Trashed Order</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="fas fa-calendar-alt"></i>
                        <span>Schedule</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('schedule') }}"><i class="fas fa-plus"></i> Add Schedule</a></li>
                        <li><a href="{{ route('manage.schedule') }}"><i class="fas fa-tasks"></i> Manage Schedule</a></li>
                    </ul>
                </li>
                @endif
                @if(Auth::user()->role == '3')
                <li class="menu-title">User</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>User</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('users') }}"><i class="fas fa-tasks"></i> Manage User</a></li>
                    </ul>
                </li>
                @endif

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
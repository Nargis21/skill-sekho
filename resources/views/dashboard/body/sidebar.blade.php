<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">

            <li class="menu-title">Dashboard</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>My Account</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('my.courses') }}">My Courses</a></li>
                </ul>
            </li>

            <li class="menu-title">Frontend Setup</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Home Page Setups</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('home.banner') }}">Update Banner</a></li>
                    <li><a href="{{ route('slider.content') }}">Update Slider Content</a></li>
                    <li><a href="{{ route('slider.images') }}">Update Slider Images</a></li>
                </ul>
            </li>

            <li class="menu-title">Course & Category</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Category</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('category') }}">Add Category</a></li>
                    <li><a href="{{ route('manage.category') }}">Manage Category</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Course</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('course') }}">Add Course</a></li>
                    <li><a href="{{ route('manage.course') }}">Manage Course</a></li>
                </ul>
            </li>
            <li class="menu-title">Order & User</li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>Order</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('pending.orders') }}">Pending Order</a></li>
                    <li><a href="{{ route('approved.orders') }}">Approved Order</a></li>
                    <li><a href="{{ route('trashed.orders') }}">Trashed Order</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="ri-account-circle-line"></i>
                    <span>User</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{ route('users') }}">Manage User</a></li>
                </ul>
            </li>

            
        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
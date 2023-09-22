<div class="vertical-menu">

    <div data-simplebar class="h-100">


        <div class="text-center user-sidebar">
            <div class="dropdown">
                <div class="user-img">
                    <img src="https://ui-avatars.com/api/?name={{ str_replace(' ', '+', $user->name) }}&background=fff&color=ff4f3f&&bold=true"
                        alt="" class="rounded-circle">
                    <span class="avatar-online bg-success"></span>
                </div>
                <div class="user-info">
                    <h5 class="mt-3 text-white font-size-16">{{ $user->name }}</h5>
                    <span class="font-size-13 text-white-50">{{ $user->getRoleNames()[0] }}</span>
                </div>
            </div>
        </div>



        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span>Homepage Setting</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.slider.index') }}">Slider Management</a></li>
                        <li><a href="#">Contact Information</a></li>
                        <li><a href="{{ route('admin.review.index') }}">Review Management</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="dripicons-store"></i>
                        <span>Cake Management</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('admin.product.index') }}">Data Cake</a></li>
                        <li><a href="{{ route('admin.product.create') }}">Add Cake</a></li>
                        <li><a href="{{ route('admin.categoryProduct.index') }}">Add Category Cake</a></li>
                    </ul>
                </li>


                <li>
                    <a href="{{ route('admin.imageManagement') }}" class="waves-effect">
                        <i class="dripicons-home"></i>
                        <span>Image Management</span>
                    </a>
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>

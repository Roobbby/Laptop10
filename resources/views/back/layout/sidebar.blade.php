<div id="left-sidebar" class="sidebar">
    <a href="#" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
    <div class="navbar-brand">
        <a href="index.html"><img src="front/assets/images/logo.svg" alt="Mooli Logo" class="img-fluid logo"><span>Rizky Comp</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="/back/assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Web Developer,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>Admin</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <!-- <li><a href="page-profile.html"><i class="fa fa-user"></i>My Profile</a></li>
                    <li><a href="app-inbox.html"><i class="fa fa-envelope"></i>Messages</a></li>
                    <li><a href="setting.html"><i class="fa fa-gear"></i>Settings</a></li>
                    <li class="divider"></li> -->
                    <li><a href="{{ route('home') }}"><i class="fa fa-power-off"></i>Logout</a></li>
                </ul>
            </div>
        </div>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu animation-li-delay">
                <li class="header"> Menu</li>
                <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                <li class="{{ Request::routeIs('product.index') ? 'active' : '' }}"><a href="{{ route('product.index') }}"><i class="fa fa-folder"></i> <span>Product</span></a></li>
                <!-- <li><a href="#"><i class="fa fa-tasks"></i> <span>Hasil Rekomendasi</span></a></li> -->
            </ul>
        </nav>
    </div>
</div>


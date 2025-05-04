<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel </title>
    <!-- Meta -->
    <meta name="description" content="Welcome To Aditya Engineers
">
    <meta name="keywords" content="Welcome To Aditya Engineers
">
    <meta property="og:title" content="Welcome To Aditya Engineers
">
    <meta property="og:description" content="Welcome To Aditya Engineers
">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <!-- *************
         ************ CSS Files *************
         ************* -->
    <link rel="stylesheet" href="{{ asset('dash_assets/fonts/remix/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/dataTables.bs5.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/dataTables.bs5-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/datatables/buttons/dataTables.bs5-custom.css') }}">
    <!-- *************
         ************ Vendor Css Files *************
         ************ -->
    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="{{ asset('dash_assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>
    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class='spin-wrapper'>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
        </div>
    </div>
    <!-- Loading ends -->
    <!-- Page wrapper starts -->
    <div class="page-wrapper">
        <!-- App header starts -->
        <div class="app-header d-flex align-items-center">
            <!-- Toggle buttons starts -->
            <div class="d-flex">
                <button class="toggle-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
                <button class="pin-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
            <!-- Toggle buttons ends -->
            <!-- App brand starts -->
            <div class="app-brand ms-3">
                <a href="{{ route('admin.dashboard') }}" class="d-lg-block d-none bg-white p-1">
                    <img src="" class="logo"
                        alt="logo ">
                </a>
                <a href="{{ route('admin.dashboard') }}" class="d-lg-none d-md-block bg-white p-1">
                    <img src="" class="logo"
                        alt="logo"
                        style="
               max-width: 141px;
               max-height: 53px;
               ">
                </a>
            </div>
            <!-- App brand ends -->
            <!-- App header actions starts -->
            <div class="header-actions">
                <!-- Header user settings starts -->
                <div class="dropdown ms-2">
                    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-box">Admin</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg">
                        <div class="px-3 py-2">
                        </div>
                        {{-- 
                  <div class="mx-2 my-2 d-grid">
                     <a href="" class="btn btn-danger">Change-password</a>
                  </div>
                  --}}
                        <div class="mx-3 my-2 d-grid">
                            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
                        </div>
                    </div>
                </div>
                <!-- Header user settings ends -->
            </div>
            <!-- App header actions ends -->
        </div>
        <!-- App header ends -->
        <!-- Main container starts -->
        <div class="main-container">
            <!-- Sidebar wrapper starts -->
            <nav id="sidebar" class="sidebar-wrapper">
                <!-- Sidebar profile starts -->
                <div class="sidebar-profile">
                    <img src="{{ asset('dash_assets/admin_icon.png') }}" class="img-shadow img-3x me-3 rounded-5"
                        alt="vizag bikes cars">
                    <div class="m-0">
                        <h5 class="mb-1 profile-name text-nowrap text-truncate">Admin</h5>
                    </div>
                </div>
                <!-- Sidebar profile ends -->
                <!-- Sidebar menu starts -->
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li class="{{ request()->routeIs('admin.dashboard') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="ri-home-6-line"></i>
                                <span class="menu-text"> Dashboard</span>
                            </a>
                        </li>
                    
                       
                        <li class=" {{ request()->routeIs('testimonials.*') ? 'current-page' : '' }}">
                            <a href="{{ route('courses.index') }}">
                                <i class="ri-projector-fill"></i>
                                <span class="menu-text">Course  Details
                                </span>
                            </a>
                        </li>
                      
                       
                        <li class=" {{ request()->routeIs('contact-details.*') ? 'current-page' : '' }}">
                            <a href="{{route('registerStudent')}}">
                                <i class="ri-contacts-fill"></i>
                                <span class="menu-text">Register Student
                                </span>
                            </a>
                        </li> 
                       
                        <li class=" {{ request()->routeIs('admin.change-password') ? 'current-page' : '' }}">
                            <a href="{{route('admin.change-password')}}">
                                <i class="ri-contacts-fill"></i>
                                <span class="menu-text"> Change Password  
                                </span>
                            </a>
                        </li> 
                        
                        <li class="{{ request()->routeIs('admin.logs-details') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.logs-details') }}">
                                <i class="ri-logout-circle-r-fill"></i>
                                <span class="menu-text">Admin Logs</span>
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('admin.logout') ? 'current-page' : '' }}">
                            <a href="{{ route('admin.logout') }}">
                                <i class="ri-arrow-left-circle-fill"></i>
                                <span class="menu-text">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar menu ends -->
            </nav>
            <!-- Sidebar wrapper ends -->
            <div class="app-container">

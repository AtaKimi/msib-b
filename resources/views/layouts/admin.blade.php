<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <!-- Customized Bootstrap Stylesheet -->
    @vite(['resources/sass/app.scss', 'resources/js/admin.js', 'resources/js/app.js'])

</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{route('homepage')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="bi bi-book-fill me-2"></i>Digitaliz</h3>
                </a>
                <div class="navbar-nav w-100">
                    <a href="{{ route('dashboard') }}"
                        class="nav-item nav-link @if (Request::url() === route('dashboard')) active @endif"><i
                            class="fa fa-tachometer-alt me-2 text-info"></i>Dashboard</a>
                    <a href="{{ route('admin-blog-index') }}"
                        class="nav-item nav-link @if (Request::url() === route('admin-blog-index')) active @endif"><i
                            class="bi bi-book text-info me-2"></i>Blogs</a>
                    <a href="{{ route('admin-blog-create') }}"
                        class="nav-item nav-link @if (Request::url() === route('admin-blog-create')) active @endif"><i
                            class="bi bi-book-fill me-2 text-info"></i>Create Blog</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content d-flex flex-column justify-content-between">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="{{route('homepage')}}" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown py-2">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-lg-inline-flex">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                <li class="nav-item"><a class="nav-link px-lg-1 py-2 py-lg-3" type="submit"
                                        onclick="this.closest('form').submit();">Logout</a>
                                </li>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            @yield('content')

            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4 mt-auto">
                <div class="bg-light rounded-top p-4">
                    <div class="col-12 col-sm-6 text-center text-sm-start">
                        &copy; <a href="/" class="text-decoration-none text-black-50">Digitaliz</a>, All Right
                        Reserved.
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    @yield('scripts')
</body>

</html>

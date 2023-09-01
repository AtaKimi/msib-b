<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Digitaliz</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/js/guest.js'])
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="{{ route('homepage') }}">Digitaliz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('homepage') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                            href="{{ route('contact') }}">Contact</a></li>
                    @if (!Auth::user())
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4"
                                href="{{ route('dashboard') }}">Dashboard</a></li>
                        <form method="post" action="{{ route('logout') }}">
                            @csrf
                            <li class="nav-item"><a class="nav-link px-lg-1 py-2 py-lg-3" type="submit"
                                    onclick="this.closest('form').submit();"><button type="submit"
                                        class="bg-primary border-1 rounded font-family-open-sans fw-bold text-white px-2 py-1">Logout</button></a>
                            </li>
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <!-- Footer-->
    <footer class="border-top">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <ul class="list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#!" class="me-3">
                                <i class="bi bi-twitter container-fluid rounded-circle px-3 py-2 social-media-icon"
                                    style="color:white; font-size: 25px"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="me-3">
                                <i class="bi bi-facebook container-fluid rounded-circle px-3 py-2 social-media-icon"
                                    style="color:white; font-size: 25px"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="me-3">
                                <i class="bi bi-github container-fluid rounded-circle px-3 py-2 social-media-icon"
                                    style="color:white; font-size: 25px"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="text-muted text-center fst-italic font-family-lora fs-5">Copyright &copy; Lorem.co</div>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>

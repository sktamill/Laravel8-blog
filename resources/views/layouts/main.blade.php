<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel8-Blog</title>
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }} ">
    <link rel="stylesheet" href="{{asset('assets/vendors/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/aos/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script src="{{asset('assets/vendors/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/loader.js')}}"></script>
</head>
<body>
    <div class="edica-loader"></div>
    <header class="edica-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="{{route('name.index')}}"><img class="w-25" src="{{ asset('assets/images/laravel-logo.png') }}" alt="Blog"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#edicaMainNav" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="edicaMainNav">
                    <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('name.index')}}">Larave8-Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('name.categories')}}">Caregories</a>
                        </li>
                        <li class="nav-item">
                            @auth()
                                @if(\Illuminate\Support\Facades\Auth::user()->role == \App\Models\User::ROLE_ADMIN)
                                    <a class="nav-link" href="{{route('main.index')}}">Account</a>
                                @else
                                    <a class="nav-link" href="{{route('personal.index')}}">Account</a>
                                @endif
                            @endauth
                            @guest()
                                <a class="nav-link" href="{{route('personal.index')}}">Login</a>
                            @endguest
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    @yield('content')

    <footer class="edica-footer" data-aos="fade-up">
        <div class="container">
            <div class="footer-bottom-content">
                <nav class="nav footer-bottom-nav">
                    <a href="{{route('name.index')}}">Main</a>
                    <a href="{{route('name.categories')}}">Categories</a>
                </nav>
                <p class="mb-0">Laravel8-Blog | Sergiy Pozhydaev</p>
                <p>All rights reserved</p>
            </div>
        </div>
    </footer>

    <script src="{{asset('assets/vendors/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('assets/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/vendors/aos/aos.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
        AOS.init({
            duration: 1000
        });
      </script>
</body>

</html>

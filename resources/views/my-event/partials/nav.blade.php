<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        {{-- <a class="navbar-brand" href="#page-top"><img src="{{ asset('agency/assets/img/navbar-logo.svg') }}" alt="..." /></a> --}}
        <a href="/" class="nav-link text-white text-uppercase">What's New!</a>
        <a href="{{ url('create-yours') }}" class="nav-link text-white text-uppercase">Create Yours!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @auth
                    @role('admin')
                        <li class="nav-item pointer-event"><a class="nav-link" style="cursor: context-menu; margin-top: -3.5px"><i class="fa fa-user-circle position-relative mx-1" style="font-size: 22px; top: 2px"></i> {{ Auth::user()->name }}</a></li>
                        <li class="nav-item"><a href="{{ url('admin/orders') }}" class="nav-link">Dashboard</a></li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li class="nav-item"><button type="submit" class="btn btn-warning signup">Logout</button></li>
                        </form>
                    @else
                        <li class="nav-item pointer-event"><a class="nav-link login" style="cursor: context-menu"><i class="fa fa-user-circle position-relative mx-1" style="font-size: 22px; top: 2px"></i> {{ Auth::user()->name }}</a></li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <li class="nav-item"><button type="submit" class="btn btn-warning signup">Logout</button></li>
                        </form>
                    @endrole
                @else
                    <li class="nav-item pointer-event"><a class="nav-link login" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-outline-warning text-warning sign-up" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
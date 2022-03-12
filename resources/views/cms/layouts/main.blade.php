<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
   
    <!-- Bootstrap 5 CDN Start-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" 
    crossorigin="anonymous">
    <!-- Bootstrap 5 CDN End-->
    <!-- Font-Awesome Start -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" 
    crossorigin="anonymous">
    <!-- FontAwesome End -->
    <link rel="stylesheet" href="{{url('css/style.css')}}">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-custom4 navbar-custom">
        <div class="container-fluid">
            <a class="navbar-brand ms-5" href="{{ url('/') }}">
                {{-- <img src="{{url('assets/image/navbar-Icon.svg')}}" class="logo-image" alt="logo-image"> --}}
                Hallo Admin !!
            </a>
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto flex-nowrap me-5">
                    <li class="nav-item {{(request()->is('/')) ? 'active' : '' }}">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    @if (Auth::user()->hasRole('admin'))
                      <li class="nav-item">
                        <a id="btnMembership" class="nav-link {{(request()->is('admin/materi')) ? 'active' : '' }}" href="/admin/materi">cms</a>
                      </li>
                    @endif
                    
                    @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                         {{Auth::user()->name}}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </li>
                    @endif
                    
                    
                </ul>
            </div>
        </div>
    </nav>
    <div class="d-flex" id="wrapper">
        
        <!-- Sidebar-->
        {{-- <div class="border-end bg-dark" id="sidebar-wrapper">
            
            <div class="sidebar-heading  bg-dark "> <a href="/" class="text-decoration-none text-white">KIMIA</a> </div>
           
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="/cms/materi">Materi</a>
                <a class="list-group-item list-group-item-action list-group-item-dark p-3" href="/cms/user">User</a>
            </div>
        </div> --}}
            
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
    
    
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!--sidebar JS-->
    <script src="{{url('cms-style/scripts.js')}}"></script>
    @yield('script')
</body>
</html>
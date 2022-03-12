<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" 
    integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" 
    crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/style.css')}}">
    <title>-materi-</title>
  </head>
  <body>
    @if (Auth::check())
    <nav class="navbar navbar-expand-lg bg-custom4 navbar-custom">
      <div class="container-fluid">
          <a class="navbar-brand ms-5" href="{{ url('/') }}">
              {{-- <img src="{{url('assets/image/navbar-Icon.svg')}}" class="logo-image" alt="logo-image"> --}}
              Welcome !!
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
                      <a id="btnMembership" class="nav-link {{(request()->is('/admin/materi')) ? 'active' : '' }}" href="/admin/materi">cms</a>
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
    @endif
   <main>
       @yield('content-main')
   </main>

    <!-- Optional JavaScript; choose one of the two! -->
   @yield('script')
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
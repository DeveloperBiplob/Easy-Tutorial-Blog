@php
    $website = App\Models\Website::find(1);
    $latestPost = App\Models\Post::latest()->find(1);
@endphp
<style>
    .website-logo {
        width: 200px;
        height: 50px;
        border: 1px solid #f48840;
    }
</style>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>{{ $website->title ?? 'Default Title' }}</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('Frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('Frontend') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('Frontend') }}/assets/css/templatemo-stand-blog.css">
    <link rel="stylesheet" href="{{ asset('Frontend') }}/assets/css/owl.css">
    <!-- Toastr Notification-->
    {{-- <link rel="stylesheet" href="{{ asset('plugins') }}/toaster.css"> --}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    @stack('css')
  </head>
  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
            @if($website->logo)
            <div class="website-logo">
                <a href="/">
                    <img width="100%" height="100%" src="{{ asset($website->logo) }}" alt="">
                </a>
            </div>
              @else
              <a class="navbar-brand" href="/"><h2>{{ $website->title }}<em>.</em></h2></a>
            @endif
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item {{ Route::is('frontend.home-page') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('frontend.home-page') }}">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item {{ Route::is('frontend.about-us') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('frontend.about-us') }}">About Us</a>
              </li>
              <li class="nav-item {{ Route::is('frontend.all-post') || Route::is('frontend.category-wise-post') || Route::is('frontend.tag-wise-post') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('frontend.all-post') }}">Blog Entries</a>
              </li>
              <li class="nav-item {{ Route::is('frontend.single-post') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('frontend.single-post', $latestPost->slug) }}">Post Details</a>
              </li>
              <li class="nav-item {{ Route::is('frontend.contact') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('frontend.contact') }}">Contact Us</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    @yield('frontend_primary_content')


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="{{ $website->facebook }}" target="_blank">Facebook</a></li>
              <li><a href="{{ $website->twitter }}" target="_blank">Twitter</a></li>
              <li><a href="{{ $website->behance }}" target="_blank">Behance</a></li>
              <li><a href="{{ $website->linnkdin }}" target="_blank">Linkedin</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>{{ $website->footer }}

                 | Design : <a rel="nofollow" href="/" target="_parent">Developer Biplob</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('Frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('Frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('Frontend') }}/assets/js/custom.js"></script>
    <script src="{{ asset('Frontend') }}/assets/js/owl.js"></script>
    <script src="{{ asset('Frontend') }}/assets/js/slick.js"></script>
    <script src="{{ asset('Frontend') }}/assets/js/isotope.js"></script>
    <script src="{{ asset('Frontend') }}/assets/js/accordions.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script> --}}

    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
    <!-- Toastr Notification-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
    <script>
        @if (Session::has('success'))
        // alert('Comment Added Successfully!');
        toastr.success("{{ Session::get('success') }}", 'Success!')
        @elseif(Session::has('warning'))
        // alert('You are already Commented!');
            toastr.warning("{{ Session::get('warning') }}", 'Warning!')
        @elseif(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", 'Error!')
        @endif
    </script>
    @stack('script')

  </body>
</html>

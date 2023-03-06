<!DOCTYPE html>

<html lang="en">
@auth

<head>

  @include('partials.head')

</head>

<body class="sidebar-noneoverflow">



  @include('partials.nav')
  <!--  BEGIN MAIN CONTAINER  -->
  <div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>

    @include('partials.sidebar')





    <div id="content" class="main-content">
      <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">


          @yield('content')
        </div>
      </div>
    </div>
  </div>


  @include('partials.footer')

  @include('partials.footer-script')
</body>
@endauth

</html>
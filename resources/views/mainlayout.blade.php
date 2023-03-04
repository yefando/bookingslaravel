<!DOCTYPE html>

<html lang="en">

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
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
          <div class="widget-content widget-content-area br-6">
@yield('content')
        </div>
      </div>
    </div>
</div>


@include('partials.footer')

@include('partials.footer-script')
 </body>

</html>
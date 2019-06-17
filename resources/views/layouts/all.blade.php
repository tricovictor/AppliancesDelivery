<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/custom.css')}}">
  <link rel="stylesheet" href="{{ asset('css/nuestro.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Dosis|Oswald" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/W3.css')}}">

  <link href="{{ asset('fonts/fontawesome-free/css/fontawesome.css') }}" rel="stylesheet">
  <link href="{{ asset('fonts/fontawesome-free/css/brands.css') }}" rel="stylesheet">
  <link href="{{ asset('fonts/fontawesome-free/css/solid.css') }}" rel="stylesheet">
  <script src="{{ asset('js/jquery.js')}}"></script>
  <script defer src="{{ asset('fonts/fontawesome-free/js/all.js') }}"></script>

 <!-- Validacion JavaScript --> 
  <link rel="stylesheet" href="{{ asset('css/validation/validationEngine.jquery.css') }}">
  <script src="{{ asset('js/validation/jquery.validationEngine-es.js') }}"></script>
  <script src="{{ asset('js/validation/jquery.validationEngine.js') }}"></script>


</head>
<body > 
<div class="row">
    <div class="col-md-12">
        @include('partials.nav')
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <img src="{{Storage::url('images/banner.png') }}" style="width:100%; height:200px;" >  
    </div>
</div>
<div class="row" style="background-image: url({{Storage::url('images/index.png')}});
    background-repeat: no-repeat;
    background-size: cover;">
    </br>
    <div class="col-md-1"></div>
    <div class="col-md-10">
        @yield('content')
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row">
      <div class="col-md-1"></div>
      <div class="col-md-9">
        <p>
 
        </p>
        
      </div>
</div>
    
    <script src="{{ asset('js/bootstrap.js')}}"></script>
    <script src="{{ asset('js/dropdown.js')}}"></script>
    <script src="{{ asset('js/custom.js')}}"></script>


        <footer>
            <div class="row" >
                <img src="{{Storage::url('images/linea.jpg') }}" style="width:100%; height:25px;" >  

                <div style="background-color: #c6d6e4; text-align: center;">
                    Copyright &copy; <b>Square1</b>. Realizado por <b>DevelopmentUY</b>
                </div>
                
            </div>
        </footer>
    @yield('customJS')

</body>


</html>
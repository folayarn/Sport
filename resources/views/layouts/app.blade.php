
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <meta name="csrf-token" content="{{ csrf_token() }}">



    <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">


    <title>{{ config('app.name', 'Footballing Galactico') }}</title>


</head>



<body>
    <div class="container-fluid" style="position:relative">
@include('inc.nav')


            @yield('content')
@include('inc.footer')
    </div>


    <script src="{{secure_asset('js/app.js')}}"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );

    </script>





<script>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>



</body>



</html>

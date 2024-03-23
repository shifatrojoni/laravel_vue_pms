<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="frontend/fonts/icomoon/style.css">

  <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
  <link rel="stylesheet" href="frontend/css/magnific-popup.css">
  <link rel="stylesheet" href="frontend/css/jquery-ui.css">
  <link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
  <link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">


  <link rel="stylesheet" href="frontend/css/aos.css">

  <link rel="stylesheet" href="frontend/css/style.css">
        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia

        <script src="frontend/js/jquery-3.3.1.min.js"></script>
  <script src="frontend/js/jquery-ui.js"></script>
  <script src="frontend/js/popper.min.js"></script>
  <script src="frontend/js/bootstrap.min.js"></script>
  <script src="frontend/js/owl.carousel.min.js"></script>
  <script src="frontend/js/jquery.magnific-popup.min.js"></script>
  <script src="frontend/js/aos.js"></script>

  <script src="frontend/js/main.js"></script>


    </body>
</html>

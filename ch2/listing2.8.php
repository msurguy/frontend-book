<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Using a Blade layout</title>

    <!-- Bootstrap CSS served from a CDN -->
    <link
      href="http://netdna.bootstrapcdn.com/bootswatch/3.1.0/superhero/bootstrap.min.css"
       rel="stylesheet">
    <style>
    body{
      background: url("img/stardust.png");
    }
    </style>
  </head>

  <body>

    <div class="container">
      @yield('content')
    </div>

    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js">
    </script>

    @yield('scripts')
    
  </body>
</html>

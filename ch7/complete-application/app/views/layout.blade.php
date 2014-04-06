<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>

    <!-- Bootstrap CSS served from a CDN -->

    <link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css" rel="stylesheet">

    <style>
      body{
        background: url("img/stardust.png");
      }

      .centered-form .panel{
        background: rgba(255, 255, 255, 0.8);
        box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        color: #4e5d6c;
      }

      .centered-form{
        margin-top: 60px;
      }
    </style>

    @yield('styles')
  </head>

  <body>
    
    <div class="container">
      @yield('content')
    </div>

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    @yield('scripts')
  </body>
</html>
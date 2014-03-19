<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Template that use Bootstrap</title>

    <!-- Referencing Bootstrap CSS that is hosted locally -->
    {{ HTML::style('css/bootstrap.min.css') }}
  </head>

  <body>

    <div class="container">
      <div class="row">
        <h2>This template is using locally hosted Bootstrap!</h2>
      </div>
    </div>

    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>

    <!-- Referencing Bootstrap JS that is hosted locally -->
    {{ HTML::script('js/bootstrap.min.js') }}
  </body>
</html>

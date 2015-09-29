<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Team Management</title>
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href='//fonts.googleapis.com/css?family=Roboto:400,300'>

</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div id="logo" class="navbar-brand">Team Management</div>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/') }}">Home</a></li>
          <li><a href="{{ url('persons') }}">@lang('app.persons')</a></li>
          <li><a href="{{ url('teams') }}">@lang('app.teams')</a></li>
          <li><a href="{{ url('teams-and-persons') }}">@lang('app.teamsAndPersons')</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li><p class="navbar-text"><span class="glyphicon glyphicon-user"></span> {!! \Auth::user()->fullname !!}</p></li>
          <li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

  <!-- Scripts -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
    $( document ).ready(function() {
      $('.panel').fadeIn(1000, function() {
        $('.alert').slideDown();
      });
    });
  </script>
  @yield('javascript')
</body>
</html>

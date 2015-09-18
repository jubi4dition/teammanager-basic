<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Team Management</title>
  
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
  
  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
  
</head>
<body style="padding-top: 60px;">

<h2 style="text-align: center; color: #34495E;">Welcome to your</h2>
<h1 style="text-align: center; color: #34495E;">Team Management</h1>


<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <div class="panel panel-default" style="padding: 20px 30px 30px; margin-top: 25px; background: #34495E; border-radius: 10px;">
        @if (isset($error))
        <div class="alert alert-danger" style="display:none;">
          @lang('app.loginFailed')
        </div>
        @endif
        {!! Form::open(array('url' => 'login')) !!}
          <div class="form-group">
            {!! Form::label('username', trans('app.username'), array('style' => 'color: #FFF;')) !!}
            {!! Form::text('username', Input::get('username') , array('class' => 'form-control', 'placeholder' => trans('app.username'))); !!}
          </div>
          <div class="form-group" style="margin-bottom: 25px;">
            {!! Form::label('password', trans('app.password'), array('style' => 'color: #FFF;')) !!}
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => trans('app.password'))) !!}
          </div>
          <button type="submit" class="btn btn-default btn-block">@lang('app.login')</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
  $( document ).ready(function() {
    $('.panel').fadeIn(1000, function() {
      $('.alert').slideDown();
    });
  });
</script>
</body>
</html>

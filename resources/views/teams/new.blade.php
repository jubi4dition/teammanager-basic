@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    
    <div class="col-lg-5 col-lg-offset-1">
      <div class="panel panel-default">
        @if($errors->has())
        <div class="alert alert-danger" style="display: none;">
          <strong>@lang('app.errormessages'):</strong>
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
            <ul>
        </div>
        @endif
        
        {!! Form::open( array('route' => array('team.new')) ) !!}
          <div class="form-group">
            {!! Form::label('name', trans('app.name')) !!}
            {!! Form::text('name', Input::old('name') , array('class' => 'form-control', 'placeholder' => trans('app.name'))) !!}
          </div>
          <div class="form-group">
            {!! Form::label('description', trans('app.description')) !!}
            {!! Form::textarea('description', Input::old('description') , array('class' => 'form-control', 'placeholder' => trans('app.description'))) !!}
          </div>
          <button type="submit" class="btn btn-default btn-block">@lang('app.submit')</button>
        {!! Form::close() !!}
      </div>
    </div>
    
    <div class="col-lg-5">
      <div class="panel panel-default">
        <h2>Teams</h2>
        <table class="table">
        <thead>
          <tr>
            <th style="width: 50px;">ID</th>
            <th>@lang('app.name')</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($teams as $team)
        <tr>
          <td>{{ $team->id }}</td> 
            <td>{{ $team->name }}</td> 
            <td style="text-align: right;"><a class="btn btn-default" href="{!! route('team.edit',[$team->id]) !!}" role="button"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></td>
        </tr>
        @endforeach
        </tbody>
        </table>
      </div>
    </div>
    
  </div>
</div>
@endsection

@section('javascript')
<script>
$( document ).ready(function() {
    $('.alert').slideDown();
});
</script>
@endsection

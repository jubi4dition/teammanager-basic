@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    
    <div class="col-lg-5 col-lg-offset-1">
      <div class="panel panel-default">
        <h2>@lang('app.newPerson')</h2>
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
          
        {!! Form::open( array('route' => array('person.new')) ) !!}
          <div class="form-group">
            {!! Form::label('firstname', trans('app.firstname')) !!}
            {!! Form::text('firstname', Input::old('firstname') , array('class' => 'form-control', 'placeholder' => trans('app.firstname'), 'maxlength' => '32')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('lastname', trans('app.lastname')) !!}
            {!! Form::text('lastname', Input::old('lastname') , array('class' => 'form-control', 'placeholder' => trans('app.lastname'), 'maxlength' => '32')) !!}
          </div>
          <div class="form-group">
            {!! Form::label('gender', trans('app.gender')) !!}
            {!! App\Person::createFormGender() !!}
          </div>
          <div class="form-group">
            {!! Form::label('birthdate', trans('app.dateOfBirth')) !!}
             {!! Form::input('date', 'birthdate', Input::old('birthdate'), ['class' => 'form-control']) !!}
          </div>
          <div class="form-group">
            {!! Form::label('email', trans('app.email')) !!}
            {!! Form::text('email', Input::old('email') , array('class' => 'form-control', 'placeholder' => trans('app.email'), 'maxlength' => '32')) !!}
          </div>
          <button type="submit" class="btn btn-default btn-block">@lang('app.submit')</button>
        {!! Form::close() !!}
        
      </div>
    </div>
    
    <div class="col-lg-5">
      <div class="panel panel-default">
        <h2>Persons</h2>
          @if( Session::has('success'))
          <div class="alert alert-success" style="display: none;">
              {{ Session::get('success') }}
          </div>
          @endif
        <table class="table">
        <thead>
          <tr>
            <th style="width: 50px;">ID</th>
            <th>@lang('app.firstname')</th>
            <th>@lang('app.lastname')</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($persons as $person)
        <tr>
          <td>{{ $person->id }}</td> 
            <td>{{ $person->firstname }}</td> 
            <td>{{ $person->lastname }}</td>
            <td style="text-align: right;"><a class="btn btn-default" href="{!! route('person.edit',[$person->id]) !!}" role="button"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></td>
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

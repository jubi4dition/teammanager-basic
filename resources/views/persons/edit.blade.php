@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-5 col-lg-offset-1">
      <div class="panel panel-default">
        <a href="{!! route('person.remove', $person->id) !!}" class="btn btn-default" style="float: right;"><span class="glyphicon glyphicon-remove"></span> @lang('app.removePerson')</a>
        <h2 style="margin-top: 0;">Person</h2>
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
        
        @if( Session::has('success'))
          <div class="alert alert-success" style="display: none;">
              {{ Session::get('success') }}
          </div>
        @endif
        
        
        <div class="form-group">
          {!! Form::open( array('route' => array('person.edit-field', $person->id, 'firstname')) ) !!}
          {!! Form::label('firstname', trans('app.firstname')) !!}
          <div class="input-group">
            {!! Form::text('firstname', $person->firstname , array('class' => 'form-control', 'placeholder' => trans('app.firstname'), 'maxlength' => '32')) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
        
        
        <div class="form-group">
          {!! Form::open( array('route' => array('person.edit-field', $person->id, 'lastname')) ) !!}
          {!! Form::label('lastname', trans('app.lastname')) !!}
          <div class="input-group">
            {!! Form::text('lastname', $person->lastname , array('class' => 'form-control', 'placeholder' => trans('app.lastname'), 'maxlength' => '32')) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
        
        
        <div class="form-group">
          {!! Form::open( array('route' => array('person.edit-field', $person->id, 'gender')) ) !!}
          {!! Form::label('gender', trans('app.gender')) !!}
          <div class="input-group">
            {!! App\Person::createFormGender($person->gender) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>

        <div class="form-group">
          {!! Form::open( array('route' => array('person.edit-field', $person->id, 'birthdate')) ) !!}
          {!! Form::label('birthdate', trans('app.dateOfBirth')) !!}
          <div class="input-group">
            {!! Form::input('date', 'birthdate', $person->birthdate, ['class' => 'form-control']) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
        
        <div class="form-group">
          {!! Form::open( array('route' => array('person.edit-field', $person->id, 'email')) ) !!}
          {!! Form::label('email', trans('app.email')) !!}
          <div class="input-group">
            {!! Form::text('email', $person->email , array('class' => 'form-control', 'placeholder' => trans('app.email'), 'maxlength' => '64')) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
        
      </div>
    </div>
    
    <div class="col-lg-5">
      <div class="panel panel-default">
        <h2>Assigned teams</h2>
        @if(!$person->teams->isEmpty())
        <table class="table">
          <thead>
            <tr>
              <th>@lang('app.name')</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($person->teams as $team)
          <tr>
              <td>{{ $team->name }}</td> 
              <td style="text-align: right;">
                <a class="btn btn-default" href="{!! route('person.removeTeam',[$person->id, $team->id]) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a>
                <a class="btn btn-default" href="{!! route('team.edit',[$team->id]) !!}" role="button"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
              </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        @endif
        
        <div class="form-group" style="margin-top: 10px;">
          {!! Form::open( array('route' => array('person.addTeam', $person->id)) ) !!}
          {!! Form::label('team', trans('app.addTeam')) !!}
          <div class="input-group">
            {!! App\Team::createSelectbox($person->id) !!}
            <span class="input-group-btn">
              <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-plus"></span></button>
            </span>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection

@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-5 col-lg-offset-1">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <button type="button" class="btn btn-default" style="float: right;" data-toggle="modal" data-target="#removeModal"><span class="glyphicon glyphicon-remove"></span> @lang('app.removePerson')</button>
          <h2>Person</h2>
        </div>
        <div class="panel-body">
        
          <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">@lang('app.removePerson')</h4>
                </div>
                <div class="modal-body">
                  @lang('app.removePersonQuestion', ['person' => $person->firstname.' '.$person->lastname])
                </div>
                {!! Form::open( ['route' => ['person.remove', $person->id]] ) !!}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                  <button type="submit" class="btn btn-primary">@lang('app.removePerson')</button>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>
          
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
      
    </div>
    <div class="col-lg-5">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Assigned teams</h2>
        </div>
        <div class="panel-body">
          
          @if(!$person->teams->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th style="width: 50px;">ID</th>
                <th>@lang('app.name')</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($person->teams as $team)
              <tr>
                <td>{{ $team->id }}</td> 
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
</div>
@endsection

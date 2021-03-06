@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-5 col-lg-offset-1">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <button type="button" class="btn btn-default" style="float: right;" data-toggle="modal" data-target="#removeModal"><span class="glyphicon glyphicon-remove"></span> @lang('app.removeTeam')</button>
          <h2>Team</h2>
        </div>
        <div class="panel-body">
          
          <div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">@lang('app.removeTeam')</h4>
                </div>
                <div class="modal-body">
                  @lang('app.removeTeamQuestion', ['team' => $team->name])
                </div>
                {!! Form::open( ['route' => ['team.remove', $team->id]] ) !!}
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                  <button type="submit" class="btn btn-primary">@lang('app.removeTeam')</button>
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
            {!! Form::open( array('route' => array('team.edit-field', $team->id, 'name')) ) !!}
            {!! Form::label('name', trans('app.name')) !!}
            <div class="input-group">
              {!! Form::text('name', $team->name , array('class' => 'form-control', 'placeholder' => trans('app.name'))) !!}
              <span class="input-group-btn">
                <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
              </span>
            </div>
            {!! Form::close() !!}
          </div>
          
          <div class="form-group">
            {!! Form::open( array('route' => array('team.edit-field', $team->id, 'description')) ) !!}
            {!! Form::label('description', trans('app.description')) !!}
            {!! Form::textarea('description', $team->description , array('class' => 'form-control', 'placeholder' => trans('app.description'))) !!}
            <button class="btn btn-default btn-block" type="submit"><span class="glyphicon glyphicon-refresh"></span></button>
            {!! Form::close() !!}
          </div>
        </div>
      </div>
      
    </div>
    <div class="col-lg-5">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 style="margin-top: 0;">Assigned persons</h2>
        </div>
        <div class="panel-body">
          @if(!$team->persons->isEmpty())
          <table class="table">
            <thead>
              <tr>
                <th style="width: 50px;">ID</th>
                <th>@lang('app.name')</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($team->persons as $person)
              <tr>
                <td>{{ $person->id }}</td>
                <td>{{ $person->firstname }} {{ $person->lastname }}</td>
                <td style="text-align: right;">
                  <a class="btn btn-default" href="{!! route('team.removePerson',[$team->id, $person->id]) !!}" role="button"><span class="glyphicon glyphicon-remove"></span></a>
                  <a class="btn btn-default" href="{!! route('person.edit',[$person->id]) !!}" role="button"><span class="glyphicon glyphicon-circle-arrow-right"></span></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
          @endif
          
          <div class="form-group" style="margin-top: 10px;">
            {!! Form::open( array('route' => array('team.addPerson', $team->id)) ) !!}
            {!! Form::label('person', trans('app.addPerson')) !!}
            <div class="input-group">
              {!! App\Person::createSelectbox($team->id) !!}
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

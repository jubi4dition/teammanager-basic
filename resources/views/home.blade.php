@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    
    <div class="col-lg-5 col-lg-offset-1">
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
    
    <div class="col-lg-5">
      <div class="panel panel-default">
        <h2>Persons</h2>
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

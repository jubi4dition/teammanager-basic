@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-10 col-lg-offset-1">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <a href="{!! route('team.new') !!}" class="btn btn-default" style="float: right;"><span class="glyphicon glyphicon-plus"></span> @lang('app.newTeam')</a>
          <h2>Teams</h2>
        </div>
        <div class="panel-body">
          
          @if( Session::has('error'))
          <div class="alert alert-danger" style="display: none;">
              {{ Session::get('error') }}
          </div>
          @endif
          
          @if( Session::has('success'))
          <div class="alert alert-success" style="display: none;">
              {{ Session::get('success') }}
          </div>
          @endif
            
          <table class="table">
          <thead>
            <tr>
              <th style="width: 50px;">ID</th>
              <th>@lang('app.name')</th>
              <th class="hidden-xs">@lang('app.description')</th>
              <th>@lang('app.persons')</th>
              <th>&nbsp;</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($teams as $team)
          <tr>
            <td>{{ $team->id }}</td> 
              <td>{{ $team->name }}</td> 
              <td class="hidden-xs">{{ $team->description }}</td>
              <td>{{ $team->persons->count() }}</td>
              <td style="text-align: right;"><a class="btn btn-default" href="{!! route('team.edit',[$team->id]) !!}" role="button"><span class="glyphicon glyphicon-circle-arrow-right"></span></a></td>
          </tr>
          @endforeach
          </tbody>
          </table>
          
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection

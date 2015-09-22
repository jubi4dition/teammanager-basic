@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-10 col-lg-offset-1">
      <div class="panel panel-default">
        <a href="{!! route('person.new') !!}" class="btn btn-default" style="float: right;"><span class="glyphicon glyphicon-plus"></span> @lang('app.newPerson')</a>
        <h2>Persons</h2>
        
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
            <th>@lang('app.firstname')</th>
            <th>@lang('app.lastname')</th>
            <th class="hidden-xs">@lang('app.gender')</th>
            <th class="hidden-xs">@lang('app.dateOfBirth') (@lang('app.age'))</th>
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($persons as $person)
        <tr>
          <td>{{ $person->id }}</td> 
            <td>{{ $person->firstname }}</td> 
            <td>{{ $person->lastname }}</td>
            <td class="hidden-xs">{{ $person->gender() }}</td>
            <td class="hidden-xs">{{ $person->birthdate_formatted() }} {{ $person->age() }}</td>
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

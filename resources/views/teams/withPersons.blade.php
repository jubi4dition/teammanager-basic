@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row buffer-top">
    <div class="col-lg-5 col-lg-offset-1">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Ordered by team</h2>
        </div>
        <div class="panel-body">
          <table class="table table-striped">
          <thead>
            <tr>
              <th>@lang('app.team')</th>
              <th>@lang('app.person')</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($combination1 as $c)
            <tr>
              <td>{{ $c->name }}</td> 
              <td>{{ $c->firstname }} {{ $c->lastname }}</td>
            </tr>
          @endforeach
          </tbody>
          </table>
          
        </div>
      </div>
      
    </div>
    <div class="col-lg-5">
      
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Ordered by person</h2>
        </div>
        <div class="panel-body">
          
          <table class="table table-striped">
          <thead>
            <tr>
              <th>@lang('app.team')</th>
              <th>@lang('app.person')</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($combination2 as $c)
            <tr>
              <td>{{ $c->firstname }} {{ $c->lastname }}</td>
              <td>{{ $c->name }}</td> 
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

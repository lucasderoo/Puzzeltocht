@extends('layouts.app')


<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}

.navbar
{
  border-radius: 0 !important;
}


.navbar-default{
  background-color: #337ab7;
  border-color: #2e6da4;
}

.navbar-default .navbar-brand {
  color: #fff;
}

.navbar-default .navbar-brand:hover,
.navbar-default .navbar-brand:focus {
  color: #5E5E5E;
}

.navbar-default .navbar-nav > li > a {
    color: #fff;
}

.navbar-default .navbar-toggle {
  border-color: #fff
}

.navbar-default .navbar-toggle .icon-bar {
    background-color: #fff;
}





</style>
@section('content')

<div class="container">

<div class="page-header">
   <h1>Tochten die je kunt doen</h1>
</div>

<table class="table table-striped">
 <tr>
   <th>Tripnaam</th>
   <th>Aantal Opdrachten</th>
   <th>Start Tocht</th>
 </tr>
  <tbody>
  @foreach ($trips as $trip)
      <tr class='clickable-row DataTR' data-href="/home/tochten/show/{{$trip->id}}">
          <td>{{ $trip->tripname }}</td>
          <td>{{ $trip->assignments }}</td>
          <td><a href="/home/starttrip/teamoverview/{{$trip->id}}" class="btn btn-primary">Start tocht</a></td>
      </tr>
  @endforeach
  </tbody>
</table>

 <div class="page-header">
</div>

</div>

</body>

</html>
@endsection

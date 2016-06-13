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
   <h1>Tocht Starten</h1>
</div>

<h3>Dit is de tocht die jij gaat doen</h3>

  <table class="table table-striped">
 <tr>
   <th>Tochtnaam</th>
   <th>Aantal Opdrachten</th>
 </tr>
 <tr>
   <td>{{$tripname}}</td>
   <td>{{$count}}</td>
</tr>
</table>


<h3>Dit is het team waarin jij zit</h3>

  <table class="table table-striped">
 <tr>
   <th>Teamnaam</th>
   <th class="leden">Aantal Leden</th>
 </tr>
 <tr>
   <td>{{$teamname}}</td>
   <td>{{$teamsize}}</td>
</tr>
</table>


<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Laat team zien
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    @foreach($team as $user)
    <li>{{$user->name}}</li>
    @endforeach
  </ul>
  <a href="/home/starttrip/start/{{$tripid}}/{{$completed}}" class="btn btn-success"></span>@if($completed < "2")Start tocht @elseif($completed == $tripdone)Resultaten @elseif($completed > "1") Verder met tocht @endif</a>
</div>


</div>

</body>

</html>
@endsection

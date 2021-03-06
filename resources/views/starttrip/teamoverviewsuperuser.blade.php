@extends('layouts.app')


<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}

.form-control {
     width: 60%;
     margin-bottom: 5px; 
}


.button{
  width: 100%;
  float: left;
}

.navbar
{
  border-radius: 0 !important;
}

.button h1{
  float: left;
}

.tocht{
  float: right;
  padding-bottom: 9px;
    margin: 25px 0 20px;
    margin-bottom: 10px;
    margin-right: 10px;
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

.btn-default{
    margin-bottom: 15px;
}

.btn-1{
    float: right;
    margin-top: 10px;
    margin-right: 10px;
    margin-bottom: 10px;
}

.btn-succes{
  margin-right: 10px;
}

</style>
@section('content')
<div class="container">

<div class="page-header">
   <h1>Teams voor "{{$tripname}}"</h1>
      <a href="/home/starttrip/newtripsession/{{$tripid}}" class="btn btn-success tocht">Start de tocht!</a>
      <a href="/home/starttrip/createteams/{{$tripid}}" class="btn btn-success tocht">Nieuw Team</a>
      <a href="/home/starttrip/usersteams" class="btn btn-success tocht">Overzicht deelnemers</a>
</div>
<table class="table table-striped">
 <tr>
   <th>Teamnaam</th>
   <th>Aantal deelnemers</th>
 </tr>
  @foreach($teams as $team)
  <tdbody>
  <tr>
    <td>{{ $team->teamname }}</td>
    <td>{{ $team->teamsize }}</td>
  </tr>
  </tdbody>   
  @endforeach
</table>

</table>

 <div class="page-header">
</div>

</div>

</body>
</html>
@endsection
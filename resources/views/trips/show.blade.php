@extends('layouts.app')
<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
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
    margin-bottom: 0;
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
<div class="page-header button">
   <h1>Tocht "{{ $tripname }}"</h1><br>
   <a href="#" class="btn btn-primary tocht"><span class="glyphicon glyphicon-arrow-left"></span> Terug</a>
</div>

<table class="table table-striped">
 <tr>
   <th>ID</th>
   <th>Titel</th>
   <th>Vraag</th>
   <th>Antwoord 1</th>
   <th>Antwoord 2</th>
   <th>Antwoord 3</th>
   <th>Goede Antwoord</th>
   <th>Longitude</th>
   <th>Latitude</th>
   <th>Laatst Geupdate</th>
   <th>Gecreerd</th>
 </tr>
 @foreach ($assignments as $assignment)
   <tr>
      <td>{{ $assignment->id }}</td>
      <td>{{ $assignment->title }}</td>
      <td>{{ $assignment->question }}</td>
      <td>{{ $assignment->answer_1 }}</td>
      <td>{{ $assignment->answer_2 }}</td>
      <td>{{ $assignment->answer_3 }}</td>
      <td>{{ $assignment->correct_answer }}</td>
      <td>{{ $assignment->longitude }}</td>
      <td>{{ $assignment->latitude }}</td>
      <td>{{ $assignment->updated_at }}</td>
      <td>{{ $assignment->created_at }}</td>
   </tr>
 @endforeach
</table>

<div class="page-header">
</div>

</div>


</body>

</html>
@endsection
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
    margin-bottom: 10;
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


</style>
@section('content')

<div class="container">
 <div class="page-header button">
   <h1>Opdrachten Koppelen</h1> <a href="#" class="btn btn-primary tocht"><span class="glyphicon glyphicon-arrow-left"></span> Terug</a>
</div>
{!! Form::open(['method' => 'post', 'url' => '/home/opdrachten/connectassignments/'. $tripid . '/' .$prevurl]) !!}
<table class="table table-striped">
<tr>
      <th>Type</th>
      <th>Titel</th>
      <th>Koppel</th>
  </tr>
  <tdbody>
  @foreach ($assignments as $assignment)
  <tr>
      <td>{{ $assignment->type }}</td>
      <td>{{ $assignment->title }}</td>
      <td><input type="checkbox" name="connect[]" value="{{$assignment->id}}"></td>
  </tr>
  @endforeach
  </tdbody>
</table>

<div class="page-header">
</div>

<button class="btn btn-primary"></span> Update</button>
{!! Form::close() !!}


</div>

</body>

</html>
@endsection
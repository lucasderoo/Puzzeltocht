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
{!! Form::open(['method' => 'post', 'url' => '/home/starttrip/storeteams/' . $tripid]) !!}
<div class="container">
 <div class="page-header">
   <h1>Nieuw Team</h1>
    <label for="teamname">Teamnaam:</label><button  class="btn btn-success tocht"><span class="glyphicon glyphicon-ok"></span> Save</button>
  <input class="form-control" maxlength="100" name="teamname" type="text" required>
</div>


<table class="table table-striped">
   <tr>
    <th>Naam</th>
    <th>Koppel</th>
  </tr>
  <tbody>
  @foreach($users as $user)
  <tr>
    <td>{{ $user->name }}</td>
    <td><input type="checkbox" name="connect[]" value="{{$user->id}}"></td>
  </tr>
  </tbody>
  @endforeach
 </table>
  {!! Form::close() !!}

 <div class="page-header">
</div>


</div>

</body>

</html>
@endsection





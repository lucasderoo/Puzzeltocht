@extends('layouts.app')
<style>
.jumbotron{
    background-color:#2E2D88;
    color:white;
}

h3 {
    margin-bottom: 45px;
}

.navbar
{
  border-radius: 0 !important;
}

.form-control {
     width: 90%;
     margin-bottom: 5px; 
}

.button{
  width: 100%;
  float: left;
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


.alert-danger{ 
	width: 60%;
	margin-top: 160px;
}

.button{
  width: 100%;
  float: left;
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

</style>
@section('content')
<div class="container">

<div class="page-header button">
	<h1>Geen Toegang</h1>
	<a href="/login" class="btn btn-primary tocht">Login</a>
</div>

<div class="alert alert-danger" role="alert">
  @if($error == "1")
  <strong>Hey!</strong> Dat mag niet.
  @elseif($error == "2")
  <p>Je zit al in een team!</p>
  @endif
</div>

<div class="page-header">
</div>

</div>

</body>

</html>
@endsection

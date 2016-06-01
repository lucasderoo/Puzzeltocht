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
     width: 90% !important;
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

.btn-success {
  margin-bottom: 30px;
}
</style>
@section('content')
<div class="container">
 <div class="page-header button">
    <h1>Nieuwe Opdracht</h1>
    <a href="#" class="btn btn-primary tocht"><span class="glyphicon glyphicon-arrow-left"></span> Terug</a>
 </div>

<div class="form-group">
  {!! Form::open(['method' => 'get', 'url' => '/home/opdrachten/update/' . $id .'/'. $tripid . '/' .$prevurl]) !!}
  <h3>Vraag</h3>

    <label name="type" for="sel1">Type:</label>
    <select class="form-control" id="sel1">
      <option value="question">Vraag</option>
      <option value="type2">?</option>
      <option value="type2">?</option>
      <option value="type2">?</option>
    </select>

  <label for="title">Titel:</label>
    <input value="{{ $assignments->title }}" name="title" type="text" class="form-control" id="usr" required="required">

  <label for="question">Vraag:</label>
  <textarea value="{{ $assignments->question }}" name="question" class="form-control" rows="5" id="comment" required="required"></textarea>

  <h3>Antwoorden</h3>

  <label for="answer_1" >Antwoord 1:</label>
  <label><input type="radio" value="answer_1" checked></label>
    <input value="{{ $assignments->answer_1 }}" name="answer_1" type="text" class="form-control" id="usr" required="required">

  <label for="answer_2">Antwoord 2:</label>
  <label><input type="radio" value=""></label>
    <input value="{{ $assignments->answer_2 }}" name="answer_2" type="text" class="form-control" id="usr" required="required">

  <label for="answer_3">Antwoord 3:</label>
  <label><input type="radio" value=""></label>
    <input value="{{ $assignments->answer_3 }}" name="answer_3" type="text" class="form-control" id="usr" required="required">

  <h3>Locatie</h3>

  <label for="longitude">Longitude:</label>
    <input value="{{ $assignments->longitude }}" name="longitude" type="text" class="form-control" id="usr" required="required">

  <label for="latitude">Latitude:</label>
    <input value="{{ $assignments->latitude }}" name="latitude" type="text" class="form-control" id="usr" required="required">
</div>

<div class="page-header">
</div>

{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
{!! Form::close() !!}

</body>

</html>
@endsection



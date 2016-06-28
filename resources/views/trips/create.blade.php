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
 
<div class="page-header">
    {!! Form::open(['method' => 'post', 'url' => '/home/tochten/store/'. $tripid]) !!}
   <h1>Nieuwe Tocht</h1>
    <label for="usr">Tochtnaam:</label>
    <button href="#" class="btn btn-success tocht"><span class="glyphicon glyphicon-ok"></span> Save</button>
  <input type="text" class="form-control" id="usr" name="tripname" required>
</div>

<div class="button-group">
  <a href="/home/opdrachten/create/{{$tripid}}" class="btn btn-default"></span>Nieuwe Vraag</a>
  <a href="#" class="btn btn-default">Nieuwe ..?</a>
  <a href="#" class="btn btn-default">Nieuwe ..?</a>
  <a href="#" class="btn btn-default">Nieuwe ..?</a>
  <a href="/home/opdrachten/connect/{{$tripid}}" class="btn btn-default">Alle Opdrachten</a>
</div>
<script>
  jQuery(document).ready(function($) {
  $(".clickable-row").click(function() {
      window.document.location = $(this).data("href");
  });
  });
</script>
 <?php if ($assignments == "") : ?>
    <div class="no-data">
      <h1>No data found!</h1>
    </div>
  <?php else : ?>
<table class="table table-striped">
 <tr>
   <th>Type</th>
   <th>Titel</th>
   <th>Kenmerk</th>
   <th>Aanpassen</th>
   <th>Verwijderen</th>
   <th>Active</th>
 </tr>
 <tdbody>
    @foreach ($assignments as $assignment)
    <tr value=""class='clickable-row DataTR' data-href="/home/opdrachten/show/{{$assignment->id}}/{{$tripid}}">
        <td>{{ $assignment->type }}</td>
        <td>{{ $assignment->title }}</td>
        <?php 
            $questions = $assignment->question;
            $maxquestions = substr($questions, 0, 10);
        ?>
        <td>{{{ $maxquestions }}} ...</td>
        <td><a href="/home/opdrachten/edit/{{$assignment->id}}/{{$tripid}}" class="btn btn-info">Edit</a></td>
        <td><a href="/home/opdrachten/delete/{{$assignment->id}}/{{$tripid}}" class="btn btn-danger">Delete</a></td>
        <?php 
            if($assignment->active == "N"){
                $text = "Not active";
                $classname = "btn btn-danger";
            }
            else{
                $text = "Active";
                $classname = "btn btn-success";
            }
        ?>
    <td><a class="{{{ $classname }}}" href="/home/opdrachten/active/{{$assignment->id}}/{{$tripid}}">{{{ $text }}}</a></td>
    </tr>
    @endforeach
    </tdbody>
</table>
<?php endif; ?>
@endsection











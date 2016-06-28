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
    <h1>Tochten</h1>
     <a href="/home/tochten/wait" class="btn btn-success tocht"><span class="glyphicon glyphicon-edit"></span> Nieuwe Tocht</a>
 </div>
<table class="table table-striped">
 <tr>
   <th>Tochtnaam</th>
   <th>Aantal opdrachten</th>
   <th>Aanpassen</th>
   <th>Verwijderen</th>
 </tr>
<?php if ($trips == []) : ?>
  <div>
    <h1>No data found</h1>
  </div>
<?php else : ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script type="text/javascript">
function check_changes(){
  $result=$this-&gt;db-&gt;query("SELECT tripname FROM trips");
  $result=$this-&gt;db-&gt;fetch_array($result);
  return $result[&lsquo;counting&rsquo;];
}
</script>
<div id="show23">
@foreach ($trips as $trip)
 <tr class="clickable-row" data-href="/home/tochten/show/{{$trip->id}}">
   <td>{{ $trip->tripname }}</td>
   <td>{{ $trip->assignments }}</td>
   <td><a href="/home/tochten/edit/{{$trip->id}}" class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span> Edit</a></td>
   <td><a href="/home/tochten/delete/{{$trip->id}}" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Delete</a></td>
 </tr>
@endforeach
</div>
</table>
<?php endif; ?>
<div class="page-header">
</div>

</div>

</body>

</html>
@endsection
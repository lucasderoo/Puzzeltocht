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
   <h1>Delete tocht</h1>
</div>

{!! Form::open(['method' => 'post', 'url' => '/home/tochten/destroy/' .$id]) !!}
<table class="table table-striped">
 <tr>
   <th>ID</th>
   <th>Tripnaam</th>
   <th>Gekoppelde Opdrachten</th>
   <th>Laatst geupdate</th>
   <th>Gecreëerd</th>
 </tr>
  <tr>
   <td>{{ $trip->id }}</td>
   <td>{{ $trip->tripname }}</td>
   <td>{{ $trip->assignments }}</td>
   <td>{{ $trip->updated_at }}</td>
   <td>{{ $trip->created_at }}</td>
</table>

<button href="#" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span>Delete</button>

</div>

</body>

</html>
@endsection

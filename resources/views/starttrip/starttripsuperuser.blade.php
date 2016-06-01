@extends('layouts.app')

<style>
h3{
	text-align: center;
}
</style>
@section('content')

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
            <a class="btn btn-danger"href="/home/starttrip/stoptrip/{{$tripid}}">stop tocht</a>
               <h1>Overzicht progressie teams</h1>
               <table>
               		<tr>
               			<th>Naam</th>
               			<th>Team</th>
               			<th>Score</th>
               		</tr>
               		@foreach($teams as $team)
               		<tr>
               			<td>{{ $team->name}}</td>
               			<td>{{ $team->teamname }}</td>
               			<td>{{ $team->score }}</td>
               		</tr>
               		@endforeach
               </table>

           	</div>
        </div>
    </div>
</div>
@endsection
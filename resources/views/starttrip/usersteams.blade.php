@extends('layouts.app')

<style>
h3{
	text-align: center;
}
</style>
@section('content')

<div id="page-content-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 middiv">
               <h1>Overzicht Deelnemers</h1>
               <div class="page-header"></div>
               <table class="table table-striped">
               		<tr>
               			<th>Naam</th>
               			<th>In team?</th>
                    <th>Teamnaam</th>
               		</tr>
               		@foreach($teams as $team)
               		<tr>
               			<td>{{ $team->name }}</td>
               			<td>{{ $team->inteam }}</td>
                    <td>{{ $team->teamname }}</td>
               		</tr>
               		@endforeach
               </table>
           	</div>
        </div>
    </div>
</div>

@endsection
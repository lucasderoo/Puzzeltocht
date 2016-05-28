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
           	<table class="table-striped midtable">
           		<h3>Teams voor "{{ $tripname }}"</h3>
           		<a href="/home/starttrip/newtripsession/{{$tripid}}" class="btn btn-success">Start Tocht</a>
                <tr>
                    <th>Teamnaam</th>
                    <th>Aantal deelnemers</th>
                </tr>
            	@foreach($teams as $team)
            	<tdbody>
            	<tr>
            		<td>{{ $team->teamname }}</td>
            		<td>{{ $team->teamsize }}</td>
            	</tr>
            	</tdbody>		
            	@endforeach
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')





@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
                <p>Tochtnaam: {{ $tripname }}</p>
           		<p>jouw Score: {{ $score }}</p>
                <p>teamscore: {{ $teamscore }}</p>
                <table>
                    <tr>
                        <th>Naam</th>
                        <th>Score</th>
                    </tr>
                    @foreach($team as $teamresult)
                    <tr>
                        <td>{{ $teamresult->name }}</td>
                        <td>{{ $teamresult->score }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
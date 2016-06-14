@extends('layouts.app')





@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
                <p>Tochtnaam: {{ $tripname }}</p>
                <p>teamscore: {{ $teamscore }}</p>
                <table>
                    <tr>
                        <th>Teamnaam</th>
                        <th>Teamscore</th>
                    </tr>
                    @foreach($teams as $team)
                    <tr>
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
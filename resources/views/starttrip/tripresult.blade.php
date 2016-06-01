@extends('layouts.app')





@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
           		<h3>Resultaalt voor "{{ $tripname }}"</h3>
                <p>Goede antwoorden: {{ $good }}</p>
                <p>Foute antwoorden: {{ $wrong}}</p>
                <p>Niet ingevulde antwoorden: {{ $noanswer }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
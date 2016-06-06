@extends('layouts.app')








<style>
.team{
  display: none;
}
</style>
@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
              <script> 
                  $(document).ready(function(){
                    $("#showteam").click(function(){
                      if($('.team').css('display') == 'none')
                      {
                        $("#team").slideDown("slow");
                      }
                      else {
                        $("#team").slideUp("slow");
                      }
                    });
                });
                </script>
                <h1>Dit is de tocht die jij gaat doen</h1>

                <p>Tochtnaam: {{ $tripname }}</p>
                <p>Aantal opdrachten: {{ $count }}</p>
                
                <h1>Dit is het team waarin jij zit</h1>
                <p>Teamnaam: {{ $teamname }}</p>
                <p>Aantal leden: {{ $teamsize }}</p>
                <button id="showteam">Laat team zien</button><br>
                <div class="team" id="team">
                  @foreach($team as $teamlid)
                    <p>{{ $teamlid->name }}</p>
                  @endforeach
                </div>
                <a href="/home/starttrip/start/{{$tripid}}/1" class="btn btn-success">Start tocht</a>
            </div>
        </div>
    </div>
</div>

@endsection
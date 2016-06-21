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
               <table id="hallo"class="table table-striped">
               		<tr>
               			<th>Naam</th>
               			<th>In team?</th>
                    <th>Teamnaam</th>
               		</tr>
               		@foreach($teams as $team)
               		<tr>
               			<td id="yow" onkeyup="loaddata();">{{ $team->name }}</td>
               			<td>{{ $team->inteam }}</td>
                    <td>{{ $team->teamname }}</td>
               		</tr>
               		@endforeach
               </table>
               <div id="display_info" >

            </div>
           	</div>
        </div>
    </div>
</div>
<script>
$(function() {
  function update() {
      $.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22%5EFTSE%22)%0A%09%09&format=json&env=http%3A%2F%2Fdatatables.org%2Falltables.env&callback=?", 
      function(json){
        $('#yow').text(json.query.results.quote.Change);  
    });
  }
  setInterval(update, 30000);
  update();
});
</script>
<div id="show" style="height: 300px; width: 400px;" >
</div>
@endsection
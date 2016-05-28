@extends('layouts.app')
<style>
a{
    text-decoration: none !important;
}
.top{
    width: 100%;
    height: 100px;
    border-bottom: 1px solid black;
}
.TopInput{
    margin-left: auto;
    margin-right: auto;
    width: 235px;
}
.top h1{
    text-align: center;
}
.midtop{
    width: 100%;
    border-bottom: 1px solid black;
}
.midtopbuttons{
    width: 800px;
    margin: 10px auto;
}
.midtop a{
    display: inline-block;
}
.midtop a{
    margin-left: 31px;
    margin-right: 31px;
}
.DataTR{
    height: 70px;
}
th{
    width: 120px;
}
td{
    text-align: center;
    padding: 10px !important;
}
th{
    text-align: center !important;
}
.clickable-row:hover{
    background-color: white;
    opacity: 0.8;
    cursor: pointer;
}
.no-data{
    text-align: center;
}
table{
    margin: 10 auto;
}
.mida{
    margin: 5 auto;
    display: block !important;
}
.underlineH1{
    width: 100%;
    height: 1px;
    background-color: #999999;
    float: left;
}
.top-table table{
    width: 100%;
}
.middiv h1{
    text-align: center;
}
.newtrip{
    float: right;
    margin-top: 25px;
}
.midtable{
    float: left;
    margin-top: 15px;
}
th{
    text-align: center;
}
td{
    text-align: center;
}
</style>
@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
                <h1>Tochten die kunt doen</h1>
                <div class="underlineH1"></div>
                <div class="top-table">
                    <table class="table table-striped midtable">
                    <thead>
                      <tr>
                        <th>Tripnaam</th>
                        <th>Aantal opdrachten</th>
                        <th>Start tocht</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($trips as $trip)
                        <tr class='clickable-row DataTR' data-href="/home/tochten/show/{{$trip->id}}">
                            <td>{{ $trip->tripname }}</td>
                            <td>{{ $trip->assignments }}</td>
                            <td><a href="starttrip/teamoverview/{{$trip->id}}" class="btn btn-primary">Start tocht</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
        <!-- /#page-content-wrapper -->

</body>
</html>
@endsection


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
    float: left;
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
                        <h1>Tochten</h1>
                        <a href="/home/tochten/wait" class="btn btn-success newtrip">Nieuwe tocht</a>
                        <div class="underlineH1"></div>
                        <div class="top-table">
                        <?php if ($trips == []) : ?>
                            <div>
                                <h1>No data found</h1>
                            </div>
                        <?php else : ?>
                            <script>
                            jQuery(document).ready(function($) {
                            $(".clickable-row").click(function() {
                                window.document.location = $(this).data("href");
                            });
                            });
                            </script>
                            <table class="table table-striped midtable">
                            <thead>
                              <tr>
                                <th>Tripnaam</th>
                                <th>Aantal opdrachten</th>
                                <th>Aanpassen</th>
                                <th>Verwijderen</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach ($trips as $trip)
                                <tr class='clickable-row DataTR' data-href="/home/tochten/show/{{$trip->id}}">
                                    <td>{{ $trip->tripname }}</td>
                                    <td>{{ $trip->assignments }}</td>
                                    <td><a class="btn btn-info" href="/home/tochten/edit/{{$trip->id}}">edit</a></td>
                                    <td><a class="btn btn-danger" href="/home/tochten/delete/{{$trip->id}}">delete</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                          <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

</body>
</html>
@endsection

@extends('layouts.app')
@section('content')
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 middiv">
            <div class="tablediv">
                <h1 style="float: initial; text-align: center;">Nieuwe Tocht</h1>
            <div class="tripnameinput">
                {!! Form::open(['method' => 'post', 'url' => '/home/tochten/store/'. $tripid]) !!}
                <label>Tochtnaam:</label>
                <input type="text" name="">
            </div>
            <div class="underlineH1"></div>
            <div class="divbuttons">
                <div class="newbuttons">
                    <a class="btn btn-primary leftbuttons" href="/home/opdrachten/create/{{$tripid}}" role="button">Nieuwe vraag</a>
                    <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                    <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                    <a class="btn btn-primary midbuttons" href="#" role="button">Nieuwe ??????</a>
                    <a class="btn btn-primary rightbuttons" href="/home/opdrachten/connect/{{$tripid}}" role="button">Alle opdrachten</a>
                </div>
            </div>
            <div class="underlineH1"></div>
             <?php if ($assignments == "") : ?>
                <div class="no-data">
                    <h1>No data found!</h1>
                </div>
            <?php else : ?>
            <div class="top-table">
            <table class="table-striped midtable">
                <tr>
                    <th>Type</th>
                    <th>Titel</th>
                    <th>kenmerk</th>
                    <th>Aanpassen</th>
                    <th>Verwijderen</th>
                    <th>Active</th>
                </tr>
            <script>
            jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.document.location = $(this).data("href");
            });
            });
            </script>
                <tdbody>
                @foreach ($assignments as $assignment)
                <tr class='clickable-row DataTR' data-href="/home/opdrachten/show/{{$assignment->id}}/{{$tripid}}">
                    <td>{{ $assignment->type }}</td>
                    <td>{{ $assignment->title }}</td>
                    <?php 
                        $questions = $assignment->question;
                        $maxquestions = substr($questions, 0, 10);
                    ?>
                    <td>{{{ $maxquestions }}} ...</td>
                    <td><a href="/home/opdrachten/edit/{{$assignment->id}}/{{$tripid}}" class="btn btn-info">Edit</a></td>
                    <td><a href="/home/opdrachten/delete/{{$assignment->id}}/{{$tripid}}" class="btn btn-danger">Delete</a></td>
                    <?php 
                        if($assignment->active == "N"){
                            $text = "Not active";
                            $classname = "btn btn-danger";
                        }
                        else{
                            $text = "Active";
                            $classname = "btn btn-success";
                        }
                    ?>
                    <td><a class="{{{ $classname }}}" href="{{url('/home/opdrachten/active',$assignment->id)}}">{{{ $text }}}</a></td>
                </tr>
                @endforeach
                </tdbody>
            </table>
            {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
            {!! Form::close() !!}
            <?php endif; ?>
            </div>
        </div>
    </div>
</div>

@endsection
<?php  
  session_start();
?>
@extends('layouts.app')

<style>
.underline{
  height: 1px;
  background-color: black;
  width: 100px;
}
.answers p{
 display: inline-block;
}
.answers input{
 display: inline-block;
}
.hello{
  display: none;
}
.hide{display: none;}
</style>

@section('content')
<div id="page-content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 middiv">
        <form class="form-horizontal" role="form" id='login' method="post" action="/home/starttrip/start/result/{{$tripid}}">
        <?php $i=1; ?>
        <?php foreach($assignments as $assignment): ?>
         <?php if($i==1){?>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div id='question<?php echo $i;?>' class='cont'>
                    <?php 
                      if($assignment->type == "question"){
                        $type =  "vraag";
                      }
                    ?>
                    <p>Type: {{ $type }}</p>
                    <p class='questions' id="qname<?php echo $i;?>"> Vraag:<?php echo $i?></p>
                    <p><?php echo $assignment->question;?></p>
                    <input type="radio" value="answer_1" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_1;?>
                   <br/>
                    <input type="radio" value="answer_2" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_2;?>
                    <br/>
                    <input type="radio" value="answer_3" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_3;?>
                    <br/>                                                               
                    <br/>
                    <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>     
                     <?php }elseif($i<1 || $i<$count){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                      <p>Type: {{ $type }}</p>
                      <p class='questions' id="qname<?php echo $i;?>"> Vraag:<?php echo $i?></p>
                      <p><?php echo $assignment->question;?></p>
                      <input type="radio" value="answer_1" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_1;?>
                      <br/>
                      <input type="radio" value="answer_2" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_2;?>
                      <br/>
                      <input type="radio" value="answer_3" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_3;?>
                      <br/>                                                                    
                      <br/>
                      <!--<button id='pre<?php //echo $i;?><!--' class='previous btn btn-success' type='button'>Previous</button>-->                
                      <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>
                   <?php }elseif($i==$count){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                      <p>Type: {{ $type }}</p>
                      <p class='questions' id="qname<?php echo $i;?>"> Vraag:<?php echo $i?></p>
                      <p><?php echo $assignment->question;?></p>
                      <input type="radio" value="answer_1" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_1;?>
                      <br/>
                      <input type="radio" value="answer_2" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_2;?>
                      <br/>
                      <input type="radio" value="answer_3" id='radio1_<?php echo $assignment->id;?>' name='{{ $assignment->id }}'/><?php echo $assignment->answer_3;?>
                      <br/>                                                                      
                      <br/>

                      <!--<button id='pre<?php //echo $i;?><!--' class='previous btn btn-success' type='button'>Previous</button>-->                    
                      <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
                    </div>
                  <?php } $i++; ?>
                  @endforeach
            </form>
          </div>
      </div>
  </div>
</div>
<script>
    $('.cont').addClass('hide');
    count=$('.questions').length;
     $('#question'+1).removeClass('hide');

     $(document).on('click','.next',function(){
         element=$(this).attr('id');
         last = parseInt(element.substr(element.length - 1));
         nex=last+1;
         $('#question'+last).addClass('hide');

         $('#question'+nex).removeClass('hide');
     });

     /*$(document).on('click','.previous',function(){
             element=$(this).attr('id');
             last = parseInt(element.substr(element.length - 1));
             pre=last-1;
             $('#question'+last).addClass('hide');

             $('#question'+pre).removeClass('hide');
         });*/

    </script>
@endsection
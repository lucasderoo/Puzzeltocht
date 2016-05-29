<?php

namespace App\Http\Controllers;

use DB;

use Request;
use Auth;
use App\Assignments;
use App\Http\Requests;
use App\Trips;
use App\Tripsassignments;

use Illuminate\Support\Facades\Redirect;

function Auth(){
    if (Auth::guest()) {
      echo '<script>window.location.href = "/Puzzeltocht4/public/login";</script>';
    }
    elseif (Auth::user()->role == '2') {
      echo '<script>window.location.href = "home/;</script>';
    }
    elseif (Auth::user()->role == '3') {
      echo '<script>window.location.href = "home";</script>';
    }
  }
    function isStudent(){
      if (Auth::user()->role != 'inactive') {
        echo '<script>window.location.href = "home";</script>';
      }
    }

    function isLoggedIn(){
      if (Auth::guest()) {
        echo '<script>window.location.href = "/Puzzeltocht4/public/login";</script>';
      }
    }
class AssignmentsController extends Controller
{

  
  public function index()
  {
    isLoggedIn();
    Auth();
    $assignments = DB::table('assignments')->get();
    return view('assignments.index',compact('assignments'));
  }


  public function create($tripid)
  {
    isLoggedIn();
    Auth();
    $prevurl = $_SERVER['HTTP_REFERER'];
    if($prevurl == "http://puzzeltocht.dev/home/tochten/create/".$tripid){
        $prevurl = "create";
    }
    elseif($prevurl == "http://puzzeltocht.dev/home/tochten/edit/".$tripid){
        $prevurl = "edit";
    }
    else{
      return "ERROR";
    }
    return view('assignments.create',compact('tripid','prevurl'));
  }
  /**
  * Store a newly created resource in storage.
  *
  * @return Response
  */


  public function store($tripid, $prevurl)
  {
    isLoggedIn();
    Auth();
    $assignments=Request::all();
    $assignments = Assignments::create([
        'type' => $assignments['type'],
        'title' => $assignments['title'],
        'question' => $assignments['question'],
        'answer_1' => $assignments['answer_1'],
        'answer_2' => $assignments['answer_2'],
        'answer_3' => $assignments['answer_3'],
        'correct_answer' => $assignments['correct_answer'],
        'longitude' => $assignments['longitude'],
        'latitude' => $assignments['latitude'],
    ]);
    $newtrips = TripsAssignments::create([
        'tripids' => $tripid,
        'assignmentsids' => $assignments->id,
    ]);

    return redirect('/home/tochten/'.$prevurl.'/' .$tripid);
    //header('Location: http://puzzeltocht.dev/Puzzeltocht4/public/home/tochten/'.$prevurl.'/' .$tripid);
    //echo '<script>window.location.href = "home/tochten/$prevurl/$tripid";</script>';
  /**
  * Display the specified resource.
  *
  * @param  int  $id
  * @return Response
  */
  }


  public function show($id, $tripid)
  {
    isLoggedIn();
    Auth();
    $prevurl = $_SERVER['HTTP_REFERER'];
    if($prevurl == "http://puzzeltocht.dev/home/tochten/create/".$tripid){
        $prevurl = "create";
    }
    elseif($prevurl == "http://puzzeltocht.dev/home/tochten/edit/".$tripid){
        $prevurl = "edit";
    }
    else{
      return "ERROR";
    }
    $assignment=Assignments::find($id);
    $correct_answer = $assignment->correct_answer;
    return view('assignments.show',compact('assignment','correct_answer', 'tripid','prevurl'));

  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  int  $id
  * @return Response
  */


  public function edit($id, $tripid)
  {
    isLoggedIn();
    Auth();
    $prevurl = $_SERVER['HTTP_REFERER'];
    if($prevurl == "http://puzzeltocht.dev/home/tochten/create/".$tripid){
        $prevurl = "create";
    }
    elseif($prevurl == "http://puzzeltocht.dev/home/tochten/edit/".$tripid){
        $prevurl = "edit";
    }
    else{
      return "ERROR";
    }
    $assignments = Assignments::find($id);
    return view('assignments.edit',compact('assignments','id','tripid','prevurl'));
  }
  /**
  * Update the specified resource in storage.
  *
  * @param  int  $id
  * @return Response
  */


  public function update($id, $tripid, $prevurl)
  {
    isLoggedIn();
    Auth();
    $input=Request::all();
    $assignments=Assignments::find($id);
    $assignments->update($input);
    //header('Location: http://puzzeltocht.dev/Puzzeltocht4/public/home/tochten/'.$prevurl.'/' .$tripid);
    return redirect('/home/tochten/'.$prevurl.'/' .$tripid);
  }


  public function delete($id, $tripid)
  {
    isLoggedIn();
    Auth();
    $prevurl = $_SERVER['HTTP_REFERER'];
    if($prevurl == "http://puzzeltocht.dev/home/tochten/create/".$tripid){
        $prevurl = "create";
    }
    elseif($prevurl == "http://puzzeltocht.dev/home/tochten/edit/".$tripid){
        $prevurl = "edit";
    }
    else{
      return "ERROR";
    }
    $assignment = Assignments::find($id);
    return view('assignments.delete',compact('assignment','tripid','id','prevurl'));
  }


  public function destroy($id, $tripid, $prevurl)
  {
    isLoggedIn();
    Auth();

    Assignments::find($id)->delete();

    $assignments = DB::select( DB::raw("DELETE FROM tripsassignments WHERE assignmentsids = $id") );


    //header('Location: http://puzzeltocht.dev/Puzzeltocht4/public/home/tochten/'.$prevurl.'/' .$tripid); 
    return redirect('/home/tochten/'.$prevurl.'/' .$tripid);
  }


  public function active($id ,$tripid)
  {
    isLoggedIn();
    Auth();

    $assignments = DB::select( DB::raw("SELECT * FROM tripsassignments WHERE tripids = $tripid AND assignmentsids = $id") );
    foreach ($assignments as $assignment) {
      if($assignment->active == "Y"){
        $assignments = DB::select( DB::raw("UPDATE tripsassignments SET active = 'N' WHERE tripids = $tripid AND assignmentsids = $id") );
      }
      else{
       $assignments = DB::select( DB::raw("UPDATE tripsassignments SET active = 'Y' WHERE tripids = $tripid AND assignmentsids = $id") );
      }
      return redirect()->back();
    }
  }


  public function connect($tripid){

    $prevurl = $_SERVER['HTTP_REFERER'];
    if($prevurl == "http://puzzeltocht.dev/home/tochten/create/".$tripid){
        $prevurl = "create";
    }
    elseif($prevurl == "http://puzzeltocht.dev/home/tochten/edit/".$tripid){
        $prevurl = "edit";
    }
    else{
      return "ERROR";
    }

    $assignments = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');
    if (empty($assignments)){
      $assignments = DB::select(DB::raw("SELECT * FROM assignments WHERE id NOT IN ('')")); 
    }
    else{
      $assignments = implode(',', $assignments);
      $assignments = DB::select(DB::raw("SELECT * FROM assignments WHERE id NOT IN ($assignments)")); 
    }
    return view('assignments.connect',compact('assignments','tripid','prevurl'));
  }


  public function connectassignments($tripid, $prevurl)
  {
    isLoggedIn();
    Auth();
    
    $assignmentsids = $_POST['connect'];
    foreach($assignmentsids as $assignmentsid){
      $newtrips = TripsAssignments::create([
        'tripids' => $tripid,
        'assignmentsids' => $assignmentsid,
    ]);
    }


    //header('Location: http://puzzeltocht.dev/Puzzeltocht4/public/home/tochten/'.$prevurl.'/' .$tripid);
    return redirect('/home/tochten/'.$prevurl.'/' .$tripid);
  }
  /**
  * Remove the specified resource from storage.
  *
  * @param  int  $id
  * @return Response
  */
}
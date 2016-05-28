<?php

namespace App\Http\Controllers;

use DB;
use Auth;

use Request;

use Input;
use App\Trips;
use App\Assignments;
use App\Tripsassignments;
use App\Sessions;
use App\Tripsessions;
use App\Teams;
use App\Teamsusers;
use App\Http\Requests;

function Auth(){
	  if (Auth::guest()) {
	    echo '<script>window.location.href = "/login?error=login";</script>';
	  }
	  elseif (Auth::user()->role == '2') {
	    echo '<script>window.location.href = "/home";</script>';
	  }
	  elseif (Auth::user()->role == '3') {
	    echo '<script>window.location.href = "/home";</script>';
	  }
	}

    function isStudent(){
      if (Auth::user()->role != 'inactive') {
         echo '<script>window.location.href = "/login?error=login";</script>';
      }
    }

    function isLoggedIn(){
      if (Auth::guest()) {
        echo '<script>window.location.href = "/login?error=login";</script>';
      }
    }
class StarttripController extends Controller
{
    public function index()
    {
    	//isLoggedIn();
   		//Auth();
    	$trips = DB::table('trips')->get();




		if (Auth::user()->role == '2') {
		  	return view('starttrip.index', compact('trips'));
		  }
		  elseif (Auth::user()->role == '3') {
		  	$sessions = DB::table('sessions')->pluck('tripid');

		  	$ids = implode(',', $sessions);

		  	if ($ids == ""){
		  		$trips = array();
		  	}
		  	else{
		  		$trips = DB::select( DB::raw("SELECT * FROM trips WHERE id IN($ids)") );
		  	}
		  	return view('starttrip.indexuser', compact('trips'));
		  }
		  elseif (Auth::user()->role == '1') {
		  	 return view('starttrip.index', compact('trips'));
		  }
		  else{
		  	return "HEY! dat mag niet";
		  }
		
	} 
	public function starttrip($tripid){
	  //isLoggedIn();
   	  //Auth();
	  $trips = Trips::find($tripid);
	  $tripname = $trips->tripname;

	  $assignments = DB::table('assignments')->get();

	  $name = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

	  $ids = implode(',', $name);

	  $assignments = DB::select( DB::raw("SELECT * FROM assignments WHERE id IN($ids)") );

	  $count = count($assignments);

	  for ($i=1; $i <= $count; $i++) { 
	  		$order[] = $i;
	  }
	  foreach($order as $key => $value) { 
  		$assignments[$key]->order = $value; 
  	  }

  	  if (Auth::user()->role == '3') {
	  	return view('starttrip.starttrip', compact('tripname','assignments','order','count','tripid'));
	  }
	}
	public function newsession($tripid){
	  //isLoggedIn();
   	 // Auth();
   	  $sessions = DB::table('sessions')->pluck('tripid');
   	  if (in_array($tripid, $sessions)) {
   	  	DB::select( DB::raw("DELETE FROM sessions WHERE tripid = $tripid") );
  	  	$newsession = sessions::create([
        'tripid' => $tripid,
      ]);
  	  }
  	  else{
  	  	$newsession = sessions::create([
        	'tripid' => $tripid,
      	]);
  	  }
	  return view('starttrip.newsession', compact('tripid'));
	}
	public function newtripsession($tripid){
	  $tripsessions = DB::table('tripsessions')->pluck('tripid');
   	  if (in_array($tripid, $tripsessions)) {
   	  	DB::select( DB::raw("DELETE FROM tripsessions WHERE tripid = $tripid") );
  	  	$newtripsession = Tripsessions::create([
        'tripid' => $tripid,
      ]);
  	  }
  	  else{
  	  	$newsession = Tripsessions::create([
        	'tripid' => $tripid,
      	]);
  	  }
	  return "tocht gestart doei";
	}
	public function teamoverview($tripid)
    {
      //isLoggedIn();
   	  //Auth();
   	  $sessions = DB::table('sessions')->pluck('tripid');

   	  $tripsessions = DB::table('tripsessions')->pluck('tripid');

   	  if (in_array($tripid, $tripsessions)) {
   	  	$starttripbutton = "ok";
   	  }
   	  else{
   	  	$starttripbutton = "no";
   	  }


   	  if (in_array($tripid, $sessions)) {
		  $trips = Trips::find($tripid);

		  $tripname = $trips->tripname;

		  $teams = DB::table('teams')->get();

		  if (Auth::user()->role == '2') {
		  	return view('starttrip.teamoverviewsuperuser', compact('teams','tripname','tripid'));
		  }
		  elseif (Auth::user()->role == '3') {
		  	 return view('starttrip.teamoverviewuser', compact('teams','tripname','tripid','starttripbutton'));
		  }
		  elseif (Auth::user()->role == '1') {
		  	 return view('starttrip.teamoverviewsuperuser', compact('teams','tripname','tripid'));
		  }
	  }
	  else{
		return "HEY! dat mag niet!";
	  }
	} 
	public function createteams($tripid)
	{
		//isLoggedIn();
		$sessions = DB::table('sessions')->pluck('tripid');
		if (in_array($tripid, $sessions)){
			$users = DB::table('users')->where('role', '3')->get();
			return view('starttrip.createteam', compact('tripid','users'));
		}
		else{
			return "HEY! dat mag niet!";
		}
	}
	public function storeteams($tripid)
	{
		//isLoggedIn();
	   	//Auth();	
	    $userids = $_POST['connect'];


	    $teamsize = count($userids);

	    $newteam = Request::all();
	    $newteam = Teams::create([
        	'teamname' => $newteam['teamname'],
        	'teamsize' => $teamsize,
    	]);
    	$teamid = $newteam->id;
	    foreach($userids as $userid){
      	Teamsusers::create([
        	'teamids' => $teamid,
        	'userids' => $userid,
        	'tripids' => $tripid,
    	]);
        }
    	return redirect('/home/starttrip/teamoverview/' .$tripid);
	}

	public function tripresult($tripid)
	{
	//isLoggedIn();
   	//Auth();

   	$count = count($_POST);

   	if($count < "2"){
   		return "Niks ingevuld!";
   	}

    foreach($_POST as $key => $val) {
        if(!is_int($key)){
        }  
        else{
        	$order[] = $key;
        }
    }


    unset($_POST['_token']);

    $count = count($_POST);

    $answerinput = array_values($_POST);

    $answered = count($answerinput);

    $order = implode(',', $order);

    $assignments = DB::select( DB::raw("SELECT correct_answer FROM assignments WHERE id IN($order)") );

    $allassignments = DB::table('assignments')->pluck('correct_answer');

    $allcount = count($allassignments);

    foreach($assignments as $assignment){
    	$correct_answers[] = $assignment->correct_answer;
    }

    $rightanswer = 0;
    $wronganswer = 0;
    $noanswer = $allcount - $answered;

    //return $noanswer;

    foreach($correct_answers as $correct_answer){
    	foreach ($answerinput as $answer) {
    		if($correct_answer == $answer){
    			$rightanswer++;
    		}
    		else{
    			$wronganswer++;
    		}
    	}
    }

    if ($rightanswer > 0){
   		$good = $rightanswer / $count;
   	}
   	else{
   		$rightanswer = 0;
   	}
   	if ($wronganswer > 0){
   		$wrong = $wronganswer / $count;
   	}
   	else{
   		$wrong = 0;
   	}

   	echo 'goede antwoorden:' . $good . '<br>';
   	echo 'foute antwoorden:' . $wrong . '<br>';
   	echo 'Niet ingevulde antwoorden:' . $noanswer;

}
}


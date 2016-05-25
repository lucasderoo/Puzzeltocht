<?php

namespace App\Http\Controllers;

use DB;
use Auth;

use Request;

use Input;
use App\Trips;
use App\Assignments;
use App\Tripsassignments;
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
    	isLoggedIn();
   		Auth();
    	$trips = DB::table('trips')->get();
		if (Auth::user()->role == '1') {
			return view('starttrip.index', compact('trips','assignments'));
		}
		elseif (Auth::user()->role == '2') {
			return view('starttrip.index', compact('trips','assignments'));
		}
	} 
	public function starttrip($tripid){
	  isLoggedIn();
   	  Auth();
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
	  return view('starttrip.starttrip', compact('tripname','assignments','order','count','tripid'));
	}
	public function teamoverview($tripid)
    {
      isLoggedIn();
   	  Auth();
	  $trips = Trips::find($tripid);
	  $tripname = $trips->tripname;

	  $teams = DB::table('teams')->get();

	  if (Auth::user()->role == '2') {
	  	return view('starttrip.teamoverviewsuperuser', compact('teams','tripname','tripid'));
	  }
	  elseif (Auth::user()->role == '3') {
	  	 return view('starttrip.teamoverviewuser', compact('teams','tripname','tripid'));
	  }
	} 
	public function createteams($tripid)
	{
		isLoggedIn();
   	    Auth();
		$users = DB::table('users')->where('role', '3')->get();
		return view('starttrip.createteam', compact('tripid','users'));
	}
	public function storeteams($tripid)
	{
		isLoggedIn();
	   	Auth();	
	    $userids = $_POST['connect'];
	    $newteam=Request::all();
	    $newteam = Teamsusers::create([
	        'teamname' => $newteam['teamname'],
	    ]);
	}

	public function tripresult($tripid)
	{
	isLoggedIn();
   	Auth();

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


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
	  elseif (Auth::user()->role == '1') {
	    echo '<script>window.location.href = "/home";</script>';
	  }
	  elseif (Auth::user()->role == '2') {
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
   		if(isset(Auth::user()->role)){
    		$trips = DB::table('trips')->get();
			if (Auth::user()->role == '1') {
			  	return view('starttrip.index', compact('trips'));
			  }
			  elseif (Auth::user()->role == '2') {
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
			  else{
			  	//return "HEY! dat mag niet";
			  	$error = "1";
				return view('alert', compact('error'));
			  }
		}
		else{
			$error = "1";
			return view('alert', compact('error'));
		}
		
	} 

	public function starttrip($tripid){
	  //isLoggedIn();
   	  //Auth
		if(isset(Auth::user()->role)){
   	  		/*if (Auth::user()->role == '2') {
			  $trips = Trips::find($tripid);
			  $tripname = $trips->tripname;

			  $tripsessions = DB::table('tripsessions')->where('tripid', $tripid)->pluck('tripid'); 

			  $assignments = DB::table('assignments')->get();

			  $tripsassignments = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

			  $user =  Auth::user();

			  $userid = $user->id;

			  $userid = "$userid";

			  $inteam = DB::table('teamsusers')->where('userids', $userid)->pluck('teamids');

			  $inteam = implode('', $inteam);

			  $teamname = DB::table('teams')->where('id', $inteam)->pluck('teamname');

			  $teamname = implode('', $teamname);

			  $userinteam = DB::table('teamsusers')->where('userids', $userid)->pluck('userids');

			  $assignments =  DB::table('tripsassignments')
	            ->join('assignments', 'assignments.id', '=', 'tripsassignments.assignmentsids')
	            ->where('tripids',$tripid)
	            ->get();

	          $team = DB::table('teams')
						->join('teamsusers', 'id', '=', 'teamsusers.teamids')
						->join('users', 'userids', '=', 'users.id')
						->where('teamsusers.teamids', '=', $inteam)
						->get();

			  if (in_array($userid,$userinteam)) {
			  //$team = DB::table('teamsusers')->where('team')

			 $completed = DB::table('teamsusers')->where('userids', $userid)->pluck('completed');

			 $completed = (int)implode('',$completed);
			 $completed++;
			 $teamsize = count($team);
	         $count = count($assignments);

	         $tripdone = $count;
	         $tripdone++;

			  return view('starttrip.starttripuser', compact('tripdone','tripid','tripname','count','teamname','team','teamsize','completed'));
			 }
			 else{
			 	$error = "1";
				return view('alert', compact('error')); 
			 }*/

			if(Auth::user()->role == '1') {
				$tripsessions = DB::table('tripsessions')->where('tripid', $tripid)->pluck('tripid'); 
				if (in_array($tripid, $tripsessions)) {

					 $assignments =  DB::table('tripsassignments')
		            ->join('assignments', 'assignments.id', '=', 'tripsassignments.assignmentsids')
		            ->where('tripids',$tripid)
		            ->Where('active','Y')
		            ->get();

		            $count = count($assignments);
					$teams = DB::table('teams')->where('tripid',$tripid)->get();

					return view('starttrip.starttripsuperuser', compact('tripid','teams','count')); 
				}
				else{
					//return "Hey! dat mag niet!";
					$error = "1";
					return view('alert', compact('error'));
				}
			}
			else{
				//return "Hey! dat mag niet!";
				$error = "1";
				return view('alert', compact('error'));
			}
		}
		else{
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	public function playtrip($tripid,$number){
		if (Auth::guest()) {
    		$error = "1";
			return view('alert', compact('error'));
  		}
		elseif (Auth::user()->role == '2') {
			$trips = Trips::find($tripid);
		  	$tripname = $trips->tripname;

		 	$tripsessions = DB::table('tripsessions')->where('tripid', $tripid)->pluck('tripid'); 

		  	$assignments = DB::table('assignments')->get();

		  	$tripsassignments = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

		  	$assignments =  DB::table('tripsassignments')
            	->join('assignments', 'assignments.id', '=', 'tripsassignments.assignmentsids')
            	->where('tripids',$tripid)
            	->Where('active','Y')
            	->get();

            $user =  Auth::user();

		    $userid = $user->id;

		    $userid = "$userid";

            $score = DB::table('teamsusers')->where('userids', $userid)->pluck('score');

            $completed = DB::table('teamsusers')->where('userids', $userid)->pluck('completed');

            $completed = (int)implode('',$completed);

            $completed++;

            if($completed == $number){
            	$score = implode('',$score);

          		$count = count($assignments);

          		if($count < $number){
	          		$teamid = DB::table('teamsusers')->where('userids', '=', $userid)->pluck('teamids');

	          		$teamid = implode('',$teamid);

	          		$team = DB::table('teams')->where('id',$teamid)->pluck('score');

	          		$teams = DB::table('teams')->where('tripid',$tripid)->get();

	          		$teamscore = implode('',$team);

	          		return view('starttrip.tripresult', compact('teamname','score','tripid','tripname','teamscore','teams'));
          		}
	        	for ($i = 1; $i <= $count; $i++) {
	          		$order[] = $i;
	        	}

	    		foreach($order as $key => $value) { 
	  				$assignments[$key]->order = $value; 
	  	  		}

	  	  		foreach($assignments as $assignment) {
				    if ($assignment->order == $number) {
				        $item[] = $assignment;
				        break;
				    }
				}

				foreach ($item as $assignment) {
					$type = $assignment->type;
				}

		    	return view('starttrip.playtrip', compact('type','number','item','count','teamname','score','tripid','score'));
            }
            else{
            	//return "Hey dat mag niet!";
            	$error = "1";
				return view('alert', compact('error'));
            }
		}
		else{
			//return "Hey dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}
    public function tripscore($tripid,$number){
    	if (Auth::guest()) {
    		$error = "1";
			return view('alert', compact('error'));
  		}
    	elseif (Auth::user()->role == '2') {
	    	$user =  Auth::user();

			$userid = $user->id;

			$userid = "$userid";

		    $assignments =  DB::table('tripsassignments')
	        	->join('assignments', 'assignments.id', '=', 'tripsassignments.assignmentsids')
	        	->where('tripids',$tripid)
	        	->get();

	      	$count = count($assignments);

	    	for ($i = 1; $i <= $count; $i++) {
	      		$order[] = $i;
	    	}

			foreach($order as $key => $value) { 
					$assignments[$key]->order = $value; 
		  		}

		  		foreach($assignments as $assignment) {
			    if ($assignment->order == $number) {
			        $item[] = $assignment;
			        break;
			    }
			}

			$answer = $_POST['answer'];

			$score = DB::table('teamsusers')->where('userids', $userid)->pluck('score');
			$completed = DB::table('teamsusers')->where('userids', $userid)->pluck('completed');
			$inteam = DB::table('teamsusers')->where('userids', $userid)->pluck('teamids');
			$inteam = implode('',$inteam);

			$teamscore = DB::table('teams')->where('id', $inteam)->pluck('score');

			$teamscore = implode('',$teamscore);


			$score = implode('',$score);
			$completed = implode('',$completed);
			foreach($item as $question){
				if($question->correct_answer == $answer){
					if($question->points == ""){
						$score += 10;
						$teamscore += 10;
						$completed++;
						DB::table('teamsusers')->where('userids', $userid)->update([
							'score' => $score,
							'completed' => $completed,
				    	]);
				    	DB::table('teams')->where('id', $inteam)->update([
							'score' => $teamscore,
							'completed' => $completed,
				    	]);
				    }
				    else{
				    	$points = $question->points;
				    	$score += $points;
				    	$teamscore += $points;
						$completed++;
						DB::table('teamsusers')->where('userids', $userid)->update([
							'score' => $score,
							'completed' => $completed,
				    	]);
				    	DB::table('teams')->where('id', $inteam)->update([
							'score' => $teamscore,
							'completed' => $completed,
				    	]);
				    }
				}
				else{
					$completed++;
					DB::table('teamsusers')->where('userids', $userid)->update([
						'completed' => $completed,
			    	]);
			    	DB::table('teams')->where('id', $inteam)->update([
						'completed' => $completed,
			    	]);
				}	
			}
			$number++;
			return redirect('/home/starttrip/start/'.$tripid.'/'.$number);
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
    }


	public function stoptrip($tripid){
		if (Auth::guest()) {
    		$error = "1";
			return view('alert', compact('error'));
  		}
		elseif (Auth::user()->role == '1') {
			$tripsessions = DB::table('tripsessions')->where('tripid', $tripid)->pluck('tripid');
			if (in_array($tripid, $tripsessions)) {
				DB::table('tripsessions')->where('tripid', '=', $tripid)->delete();
				DB::table('sessions')->where('tripid', '=', $tripid)->delete();

				$teamid = DB::table('teamsusers')->where('tripids', '=', $tripid)->pluck('teamids');
				$teamid = array_unique($teamid);
				$teamid = implode('', $teamid);

				DB::table('teams')->where('id', '=', $teamid)->delete();
				DB::table('teamsusers')->where('tripids', '=', $tripid)->delete();

				return redirect('/home/starttrip'); 
			}
			elseif(Auth::user()->role == "2"){
				return redirect('/home/starttrip/start/result/'.$tripid); 
			}
			else{
				//return "Hey! dat mag niet!";
				$error = "1";
				return view('alert', compact('error'));
			}
		}
		elseif(Auth::user()->role == "2"){
		  return redirect('/home/starttrip/start/result/'.$tripid); 
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	public function newsession($tripid){
	  //isLoggedIn();
   	 // Auth();
	  if (Auth::guest()) {
    		$error = "1";
			return view('alert', compact('error'));
  	  }
	  elseif (Auth::user()->role == '1') {
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
		  return redirect('/home/starttrip/teamoverview/'.$tripid);
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	public function newtripsession($tripid){
		if (Auth::guest()) {
    		$error = "1";
			return view('alert', compact('error'));
  		}
		elseif (Auth::user()->role == '1') {
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
	  	  return redirect('/home/starttrip/start/'.$tripid);
	  	}
	  	else{
	  		//return "Hey! dat mag niet!";
	  		$error = "1";
			return view('alert', compact('error'));
	  	}
	}


	public function teamoverview($tripid)
    {
      //isLoggedIn();
   	  //Auth();
      if (Auth::guest()) {
		$error = "1";
		return view('alert', compact('error'));
  	  }
   	  $sessions = DB::table('sessions')->pluck('tripid');

   	  $tripsessions = DB::table('tripsessions')->pluck('tripid');

	  $user =  Auth::user();

	  $userid = $user->id;

	  $userid = "$userid";


	 // $inteam = DB::table('teamsusers')->where('userids', $userid)->pluck('userids');
	  	  $inteam = DB::table('teamsusers')
            ->where('tripids', '=', $tripid)
            ->where('userids', '=', $userid)
            ->pluck('userids');

      if(in_array($tripid, $tripsessions)){
      	if(in_array($userid, $inteam)){
      		$starttripbutton = "ok";
      	}
      	else{
      		$starttripbutton = "open-noteam";
      	}
	  }
	  else{
	  	$starttripbutton = "no";
	  }


   	  if (in_array($tripid, $sessions)) {
		  $trips = Trips::find($tripid);

		  $tripname = $trips->tripname;

		  $teams = DB::table('teams')->get();

		  if (Auth::user()->role == '1') {
		  	return view('starttrip.teamoverviewsuperuser', compact('teams','tripname','tripid'));
		  }
		  elseif (Auth::user()->role == '2') {
		  	 $checkteam = DB::table('teamsusers')->where('userids', $userid)->pluck('userids');

		  	  if (in_array($userid, $checkteam)) {
		  	  	$outteam = "1";
		  	  }
		  	  else{
		  	  	$outteam = "2";
		  	  }
		  	 $assignments =  DB::table('tripsassignments')
	        	->join('assignments', 'assignments.id', '=', 'tripsassignments.assignmentsids')
	        	->where('tripids',$tripid)
	        	->get();

		  	 $completed = DB::table('teamsusers')->where('userids', $userid)->pluck('completed');

		  	 $teamnames = DB::table('teamsusers')->where('userids', $userid)
		  	 	->join('teams', 'id', '=', 'teamsusers.teamids')
		  	 	->get();

		  	 if (empty($teamnames)) {
				$teamname = "";
			  }
			 else{
			  	foreach($teamnames as $teamname){
			  	$teamname = $teamname->teamname;
			  }
			}

			 $completed = (int)implode('',$completed);
			 $completed++;

			 $count = count($assignments);

	         $tripdone = $count;
	         $tripdone++;

		  	 return view('starttrip.teamoverviewuser', compact('teams','teamname','tripname','tripid','starttripbutton','outteam','completed','tripdone'));

		  }
	  }
	  else{
		//return "HEY! dat mag niet!";
		$error = "1";
		return view('alert', compact('error'));
	  }
	} 


	public function createteams($tripid)
	{
		//isLoggedIn();
		if (Auth::guest()) {
			$error = "1";
			return view('alert', compact('error'));
  	    }
		elseif (Auth::user()->role == '2' or Auth::user()->role == '1') {
			$sessions = DB::table('sessions')->pluck('tripid');
			if (in_array($tripid, $sessions)){
				$user =  Auth::user();

			    $userid = $user->id;

			    $userid = "$userid";

			    $teams = DB::table('teamsusers')->pluck('userids');

			   	if (in_array($userid, $teams)) {
			    	$teams = implode(',', $teams);
			  	}
			   	else{
			    	array_push($teams, $userid);
			    	$teams = implode(',', $teams);
			    }

			    $inteam = DB::table('teamsusers')->where('userids', $userid)->pluck('userids');

			    if (in_array($userid, $inteam)) {
				  //return "je zit al in een team!";
				  $error = "2";
				  return view('alert', compact('error'));
				}
			  	else{
			  		$users = DB::select(DB::raw("SELECT * FROM users WHERE id NOT IN ($teams) AND role = '2'"));  
					return view('starttrip.createteam', compact('tripid','users'));
			  	}
			}
			else{
				//return "HEY! dat mag niet!";
				$error = "1";
				return view('alert', compact('error'));
			}
		}
		else{
			//return "HEY! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	public function storeteams($tripid)
	{
		//isLoggedIn();
	   	//Auth();
	   	if (Auth::guest()) {
			$error = "1";
			return view('alert', compact('error'));
  	  	}
		elseif (Auth::user()->role == '2' or Auth::user()->role == '1') {

		   	$user =  Auth::user();

		  	$userid = $user->id;

		  	$userid = "$userid";

		  	$checkteam = DB::table('teamsusers')->where('userids', $userid)->pluck('userids');

		  	$checkifinteam = DB::table('teamsusers')->pluck('userids');


		  	if(in_array($userid, $checkteam)){
		  		//return "Je zit al een team!";
		  		$error = "2";
				return view('alert', compact('error'));
		  	}
		  	else{

		  		if (isset($_POST['connect'])){
					$userids = $_POST['connect'];
				}
				else{
					$userids = array();
				}

		  		array_push($userids, $userid);

		  		$count = count($userids);

		  		if($count > "1"){
			  		foreach($userids as $userid){
			  			if(in_array($userid, $checkifinteam)){
			  				$checkuser[] = DB::table('users')->where('id', $userid)->pluck('name');		
			  			}
			  		}
			  		if (empty($checkuser)) {

			  		}
			  		else{
			  			return $checkuser;
			  		}

			    	$teamsize = count($userids);

			    	$newteam = Request::all();
			    	$newteam = Teams::create([
		        		'teamname' => $newteam['teamname'],
		        		'teamsize' => $teamsize,
		        		'tripid' => $tripid,
		    		]);

			    	$teamid = $newteam->id;
		    		foreach ($userids as $userid) 
			    	{
			    		Teamsusers::create([
			        	'teamids' => $teamid,
			        	'userids' => $userid,
			        	'tripids' => $tripid,
		    		]);
			    	}
			    }
			    else{
			    	$error = "3";
					return view('alert', compact('error'));
			    }
		    }
	    	return redirect('/home/starttrip/teamoverview/' .$tripid);
	    }
	    else{
	    	//return "HEY! dat mag niet!";
	    	$error = "1";
			return view('alert', compact('error'));
	    }
	}


	public function outteam($tripid){
		if (Auth::guest()) {
			$error = "1";
			return view('alert', compact('error'));
  	    }
		elseif (Auth::user()->role == '2') {
			$user =  Auth::user();

		  	$userid = $user->id;

		  	$userid = "$userid";

		  	$teamid = DB::table('teamsusers')->where('userids', $userid)->pluck('teamids');

		  	$teamid = implode('',$teamid);

		  	$outteam = DB::table('teamsusers')->where('userids', $userid)->delete();

		  	$team = DB::table('teamsusers')->where('teamids', $teamid)->get();

		  	$count = count($team);

		  	if($count < "2"){
		  		DB::table('teamsusers')->where('teamids', $teamid)->delete();
		  		DB::table('teams')->where('id', $teamid)->delete();
		  		return redirect('/home/starttrip/teamoverview/' .$tripid);
		  	}

		  	$team = DB::table('teamsusers')->where('teamids', $teamid)->get();

		  	$teamsize = count($team);

		  	DB::table('teams')->where('id', $teamid)->update([
				'teamsize' => $teamsize,
			]);

		  	return redirect('/home/starttrip/teamoverview/' .$tripid);
		}
	}

	public function usersteams()
	{
		if (Auth::guest()) {
			$error = "1";
			return view('alert', compact('error'));
  	  	}
		elseif (Auth::user()->role == '1') {
			$teams = DB::table('users')
			->leftJoin('teamsusers', 'users.id', '=', 'teamsusers.userids')
			->leftJoin('teams', 'teams.id', '=', 'teamsusers.teamids')
			->where('role','2')->get();

			foreach($teams as $team) { 
				if($team->teamids == ""){
	  				$team->inteam = "Nee"; 
				}
				else{
					$team->inteam = "Ja"; 
				}
	  	  	}
			return view('starttrip.usersteams', compact('teams'));
		}
		else{
	    	//return "HEY! dat mag niet!";
	    	$error = "1";
			return view('alert', compact('error'));
	    }

	}
	/*public function tripresult($tripid)
	{
	//isLoggedIn();
   	//Auth();

	$trips = Trips::find($tripid);

	$tripname = $trips->tripname;


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

   	return view('starttrip.tripresult', compact('good','wrong','noanswer','tripname'));   	
	}*/
}


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

class TripsController extends Controller
{
   public function index()
   {
	    if (Auth::user()->role == '1') {
	   		//isLoggedIn();
	   		//Auth();
			$trips = DB::table('trips')->get();
			foreach ($trips as $trip) {
				if($trip->assignments == ""){
					DB::select( DB::raw("DELETE FROM tripsassignments WHERE tripids = $trip->id") );
					Trips::find($trip->id)->delete();
				}
			}
			return view('trips.index', compact('trips','assignments'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	} 	
	public function wait(){
		if (Auth::user()->role == '1') {
			//isLoggedIn();
			//Auth();
			$trips = Request::all();
	  		$newtrip = Trips::create($trips);
	  		$newtripid = $newtrip->id;

	  		return redirect('/home/tochten/create/'.$newtripid); 
			//return view('trips.wait', compact('newtripid'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}
  	public function create($tripid)
  	{
  	  	if (Auth::user()->role == '1') {
	      //isLoggedIn();
	      //Auth();
	      $trips=Trips::find($tripid);

		  $assignments = DB::table('assignments')->get();

		  $name = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

		  $actives = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('active');

		  $ids = implode(',', $name);

		  //return $ids;

		  if ($ids == ""){
		  	$assignments = "";
		  }
		  else{
			$assignments = DB::select( DB::raw("SELECT * FROM assignments WHERE id IN($ids)") );
		  }
	      foreach($actives as $key => $value) { 
	  		$assignments[$key]->active = $value; 
	  	  }

		  return view('trips.create',compact('assignments','tripid'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}
  	/**
  	* Store a newly created resource in storage.
  	*
  	* @return Response
  	*/
  	public function store($tripid)
  	{
  		if (Auth::user()->role == '1') {
	  		//isLoggedIn();
	  		//Auth();
	  		$trip = Request::all($tripid);
	  		$assignments = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('tripids');

	  		$count = count($assignments);
	  		if ($count < "1"){
	  			$prevurl = $_SERVER['HTTP_REFERER'];

			    if($prevurl == "http://". $_SERVER['SERVER_NAME'] ."/home/tochten/create/".$tripid){
			        $prevurl = "create";
			    }
			    elseif($prevurl == "http://". $_SERVER['SERVER_NAME'] ."/home/tochten/edit/".$tripid){
			        $prevurl = "edit";
			    }
	  			return view('trips.error',compact('tripid','prevurl'));
	  		}
	  		else{
				$assignments = array_count_values($assignments);

				$assignments = (array_values($assignments));

				$assignments =  implode("",$assignments);
				DB::table('trips')->where('id', $tripid)->update([
					'tripname' => $trip['tripname'],
					'assignments' => $assignments,
			    ]);
			    return redirect('/home/tochten'); 
			}
		}
 		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}	
	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function show($tripid)
	{	
		if (Auth::user()->role == '1') {
		  //isLoggedIn();
		  //Auth();

		  $trips = Trips::find($tripid);
		  $tripname = $trips->tripname;

		  $assignments = DB::table('assignments')->get();

		  $name = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

		  $ids = implode(',', $name);

		  $assignments = DB::select( DB::raw("SELECT * FROM assignments WHERE id IN($ids)") );

		  return view('trips.show',compact('assignments','tripid','tripname'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return Response
	*/
	public function edit($tripid)
	{
		if (Auth::user()->role == '1') {
		  //isLoggedIn();
		 // Auth();
		  $trips=Trips::find($tripid);
		  $tripname = $trips->tripname;

		  $assignments = DB::table('assignments')->get();

		  $name = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('assignmentsids');

		  $actives = DB::table('tripsassignments')->where('tripids', $tripid)->pluck('active');

		  $ids = implode(',', $name);

		  $assignments = DB::select( DB::raw("SELECT * FROM assignments WHERE id IN($ids)") );

		  foreach($actives as $key => $value) { 
		  	$assignments[$key]->active = $value; 
		  }

		  return view('trips.edit',compact('assignments','tripid','tripname'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  int  $id
	* @return Response
	*/
	
	/**
	* Remove the specified resource from storage.
    *
	* @param  int  $id
	* @return Response
	*/
	public function delete($id){
		if (Auth::user()->role == '1') {
			$trip = Trips::find($id);
			return view('trips.delete',compact('trip','id'));
		}
		else{
			//return "Hey! dat mag niet!";
			$error = "1";
			return view('alert', compact('error'));
		}
	}


	public function destroy($id)
	{
	  //isLoggedIn();
	  //Auth();
	  if (Auth::user()->role == '1'){
	  	Trips::find($id)->delete();
	 	$assignments = DB::select( DB::raw("DELETE FROM tripsassignments WHERE tripids = $id") );
	  	return redirect('/home/tochten');
	  }
	  else{
	  	//return "Hey! dat mag niet!";
	  	$error = "1";
		return view('alert', compact('error'));
	  }
	}
}

<?php

namespace App\Http\Controllers;

use App\PoliticalSeat;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use Auth;
use App\County;
use App\Http\Requests;
use App\User;

class AspirantsController extends Controller
{

    protected $user;
    protected $folder = "aspirants.";
    public function __construct(RoleRepository $roleRepository){
        $roleRepository->check();
        $this->user = Auth::user();
    }

    public function getAspirants($seat_id){

        if (isset($_GET['search'])) {
   
        $search=\Request::get('search');

        $seat = PoliticalSeat::findOrFail($seat_id);
        $qry = User::join('politics','politics.user_id','=','users.id');
        $qry->join('political_parties','politics.political_party_id','=','political_parties.id');
         $qry->join('profiles','profiles.user_id','=','users.id');
         $qry->join('counties','profiles.county_id','=','counties.id');
        $qry->join('political_seats','politics.political_seat_id','=','political_seats.id');
        $qry->select("users.*","politics.comments as tagline","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev","political_seats.id as seatId","counties.name as county_name");
        $qry->where([
            ['politics.status','=',0],
            ['political_seats.id','=',$seat_id],
            ['users.role','like','politician'],
            ['users.name','like','%'.$search.'%'] 
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['political_seats.id','=',$seat_id],
            ['users.role','like','politician'],
            ['political_parties.name','like','%'.$search.'%']
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['political_seats.id','=',$seat_id],
            ['users.role','like','politician'],
            ['counties.name','like','%'.$search.'%']
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['political_seats.id','=',$seat_id],
            ['users.role','like','politician'],
            ['political_parties.abbreviation','like','%'.$search.'%']
            ]);

        $leaders = $qry->paginate(10);
        return view($this->folder.'index',[
            'leaders'=>$leaders,
            'seat'=>$seat
        ]);
}
else
{
        $seat = PoliticalSeat::findOrFail($seat_id);
        $qry = User::join('politics','politics.user_id','=','users.id');
        $qry->join('political_parties','politics.political_party_id','=','political_parties.id');
        $qry->join('political_seats','politics.political_seat_id','=','political_seats.id');
        $qry->select("users.*","politics.comments as tagline","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev","political_seats.id as seatId");
        $qry->where([
            ['politics.status','=',0],
            ['political_seats.id','=',$seat_id],
            ['users.role','like','politician']
        ]);
        $leaders = $qry->paginate(10);
        return view($this->folder.'index',[
            'leaders'=>$leaders,
            'seat'=>$seat
        ]);
}
}
    

       public function viewAll(){

        $qry = User::join('politics','politics.user_id','=','users.id');
        $qry->join('political_parties','politics.political_party_id','=','political_parties.id');
         $qry->join('profiles','profiles.user_id','=','users.id');
         $qry->join('counties','profiles.county_id','=','counties.id');
        $qry->join('political_seats','politics.political_seat_id','=','political_seats.id');
        $qry->select("users.*","politics.comments as tagline","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev","political_seats.id as seatId","counties.name as county_name");        if (isset($_GET['search'])) {
        $search=\Request::get('search');
        $qry->where([
            ['politics.status','=',0],
            ['users.role','like','politician'],
            ['users.name','like','%'.$search.'%'] 
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['users.role','like','politician'],
            ['political_parties.name','like','%'.$search.'%']
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['users.role','like','politician'],
            ['counties.name','like','%'.$search.'%']
            ]);
        $qry->orwhere([
            ['politics.status','=',0],
            ['users.role','like','politician'],
            ['political_parties.abbreviation','like','%'.$search.'%']
            ]);
        $leaders = $qry->paginate(10);
        return view($this->folder.'index',[
            'leaders'=>$leaders,
            'seat'=>null
        ]);
    }
    else{
            $qry->where([
            ['politics.status','=',0],
            ['users.role','like','politician']
            ]);
             $leaders = $qry->paginate(10);
        return view($this->folder.'index',[
            'leaders'=>$leaders,
            'seat'=>null
        ]);
    }
    }
}

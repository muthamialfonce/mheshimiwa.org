<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Page;
use App\PoliticalSeat;
use App\ProfileComment;
use App\Region;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\County;
use App\Ward;
use App\Constituency;
use App\User;
class HomeController extends Controller
{
    protected $etc_folder = "etc.";

    public function __construct()
    {
        $role = new RoleRepository();
        $role->check(true);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function regionDetails(Request $request){
        $regions = Region::all();
        $results = [];
        $ward = null;
        if(isset($request->region_id)){
            $seats = PoliticalSeat::join('political_levels','political_levels.id','=','political_seats.political_level_id')
                ->select('political_seats.*','political_levels.name as level')
                ->get();
            $region_id = $request->region_id;
            $county_id = $request->county_id;
            $constituency_id = $request->constituency_id;
            $ward_id = $request->ward_id;
            foreach($seats as $seat){


                $qry = \App\User::join('politics','politics.user_id','=','users.id')
                    ->join('profiles','profiles.user_id','=','users.id')
                    ->join('political_parties','politics.political_party_id','=','political_parties.id')
                    ->join('political_seats','politics.political_seat_id','=','political_seats.id');
                if(strtolower($seat->level) != 'national' && strtolower($seat->level) == 'county' ){
                    $data = [];
                    $data['data']=$qry->select("users.*","politics.comments as tagline","profiles.county_id","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev")->where([
                        ['politics.status','=',0],
                        ['profiles.county_id','=',$county_id],
                        ['political_seats.id','like',$seat->id]
                    ])->where([
                        ['users.approved','=',1]
                    ])->get();
                    $data['label']=$seat->name;
                    $results[]=$data;
                }
                if(strtolower($seat->level) != 'national' && strtolower($seat->level) == 'constituency' ){
                    $data = [];
                    $data['data']=$qry->select("users.*","politics.comments as tagline","profiles.county_id","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev")->where([
                        ['politics.status','=',0],
                        ['profiles.constituency_id','=',$constituency_id],
                        ['political_seats.id','like',$seat->id]
                    ])->where([
                        ['users.approved','=',1]
                    ])->get();
                    $data['label']=$seat->name;
                    $results[]=$data;
                }
                if(strtolower($seat->level) != 'national' && strtolower($seat->level) == 'ward' ){
                    $data = [];
                    $data['data']=$qry->select("users.*","politics.comments as tagline","profiles.county_id","political_parties.name as party","political_seats.name as seat","political_parties.abbreviation as abbrev")->where([
                        ['politics.status','=',0],
                        ['profiles.ward_id','=',$constituency_id],
                        ['political_seats.id','like',$seat->id]
                    ])->where([
                        ['users.approved','=',1]
                    ])->get();
                    $data['label']=$seat->name;
                    $results[]=$data;
                }
            }
            return view('etc.region_leaders',[
                'region'=>Region::find($region_id),
                'county'=>County::find($county_id),
                'ward'=>Ward::find($ward_id),
                'constituency'=>Constituency::find($constituency_id),
                'results'=>$results
            ]);
        }
        return view('etc.my_region',[
            'results'=>$results,
            'regions'=>$regions
        ]);
    }

    public function getWards(Request $request)
    {
        $constituency = Constituency::find($request->constituency_id);
        $wards = $constituency->wards;
        return $wards;
    }

    public function getConstituencies(Request $request)
    {
        $county = County::find($request->county_id);
        $constituencies = $county->constituencies;
        return $constituencies;
    }

    public function getCounties(Request $request)
    {
        $region = Region::find($request->region_id);
        $counties = $region->counties;
        return $counties;
    }

    public function politicianProfile(User $user)
    {
        if($user->approved==0){
            die('User account not active');
        }
        $histories = $user->politics()->where('status','=',1)->get();
        $events = $user->politicalEvents()->orderBy('event_time','asc')->get();
        $agendas = $user->agendas()->orderBy('id','asc')->get();
        $educationlevels= $user->educationLevels()->orderBy('id','asc')->get();
        $experiences= $user->experiences()->orderBy('id','asc')->get();
        return view($this->etc_folder.'politician_profile',[
            'leader'=>$user,
            'histories'=>$histories,
            'events'=>$events,
            'agendas'=>$agendas,
            'educationlevels'=>$educationlevels,
            'comments'=>$this->getComments($user),
            'experiences'=>$experiences
        ]);
    }
    function getComments(User $user){
        $comments = ProfileComment::join('users','users.id','=','profile_comments.user_id')
            ->join('subscribers','subscribers.id','=','profile_comments.subscriber_id')
            ->select('profile_comments.*','subscribers.name')
            ->where([
                ['profile_comments.user_id','=',$user->id],
                ['profile_comments.approved','=',1]
            ])
            ->orderBy('profile_comments.id','asc')
            ->get();
        return $comments;
    }

    public function workability(){
        return view($this->etc_folder.'how_it_works');
    }
    public function about(){
        return view($this->etc_folder.'about');
    }

    public function allWards(){
        $wards = Ward::orderby('name','asc')->get();
        return $wards;
    }

    public function addSubscriber(Request $request){
        $subscriber = Subscriber::where([
            ['email','like',str_replace(' ','',$request->email)]
        ])->first();
        if($subscriber){
            $subscriber->update($request->all());
        }else{
            $subscriber = Subscriber::create($request->all());
        }
        return $subscriber;
    }

    public function showPage($slug){
        $page = Page::where([
            ['slug','like',$slug]
        ])->first();
        return view('view_page',[
            'page'=>$page
        ]);
    }
}

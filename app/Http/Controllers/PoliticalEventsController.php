<?php

namespace App\Http\Controllers;

use App\PoliticalEvent;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class PoliticalEventsController extends Controller
{
    //
    protected $user;
    protected $folder = "events.";
    public function __construct(RoleRepository $repository)
    {
        $repository->check();
        $this->user=Auth::User();
    }

    public function index(){
        $events = $this->user->politicalEvents()->orderBy('event_time','asc')->paginate(10);
        return view($this->folder.'index',[
            'events'=>$events
        ]);
    }

    public function store(Request $request){
      $event =  $this->user->politicalEvents()->updateOrCreate(['id'=>$request->id],[
          'title'=>$request->title,
          'about'=>$request->about,
          'event_time'=>$request->when,
          'place'=>$request->where,
          'rank'=>$request->rank
      ]);
        return redirect("events")->with('notice',['class'=>'success','message'=>'Event added!']);
    }

    public function delete($eventid){
        $event = $this->user->politicalEvents()->findOrFail($eventid);
        $event->delete();
        return redirect("events")->with('notice',['class'=>'success','message'=>'Event removed!']);
    }


}

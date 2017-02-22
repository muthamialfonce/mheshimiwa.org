<?php

namespace App\Http\Controllers;

use App\Profile;
use App\ProfileComment;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Repositories\RoleRepository;

class ProfileCommentsController extends Controller
{
    //
    protected $folder = "political_parties.";
    protected $user;
    protected $folder_comments = "comments.";
    public function __construct()
    {
        $role = new RoleRepository();
        $role->check();
        $this->user = Auth::user();
    }

    public function store(User $user,Request $request){
        $subscriber = Subscriber::where([
            ['email','like',$request->email]
        ])->first();
        if(!$subscriber){
            $subscriber = new Subscriber();
        }
        $subscriber->name = $request->name;
        $subscriber->email = $request->email;
        $subscriber->ward_id = $request->ward_id;
        $subscriber->save();

        $comment = $user->profileComments()->updateOrCreate(['id'=>$request->id],[
            'comment'=>$request->comment,
            'subscriber_id'=>$subscriber->id
        ]);
        return $this->getComments($user);
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
        $return = "";
            foreach($comments as $comment){
                $return.='<div  style="padding: 10px;">
                                        <div class="row">
                                            <blockquote class="testimonial">
                                                <p>
                                                    '. $comment->comment .'
                                                </p>
                                            </blockquote>
                                            <div class="arrow-down"></div>
                                            <p class="testimonial-author">'. $comment->name .' | <span>'. date('d/m/Y, h:i a',strtotime($comment->created_at)) .'</span></p>
                                        </div>
                                    </div>';
            }
        return $return;

    }

    public function myComments(){
        $user = Auth::user();
        $approved = ProfileComment::join('users','users.id','=','profile_comments.user_id')
            ->join('subscribers','subscribers.id','=','profile_comments.subscriber_id')
            ->select('profile_comments.*','subscribers.name')
            ->where([
                ['profile_comments.user_id','=',$user->id],
                ['profile_comments.approved','=',1]
            ])
            ->orderBy('profile_comments.id','asc')
            ->paginate(10);
        $pending = ProfileComment::join('users','users.id','=','profile_comments.user_id')
            ->join('subscribers','subscribers.id','=','profile_comments.subscriber_id')
            ->select('profile_comments.*','subscribers.name')
            ->where([
                ['profile_comments.user_id','=',$user->id],
                ['profile_comments.approved','=',0]
            ])
            ->orderBy('profile_comments.id','asc')
            ->paginate(10);
        return view($this->folder_comments.'index',[
            'approved'=>$approved,
            'pending'=>$pending
        ]);
    }

    public function delete($profile_comment_id){
        $comment = $this->user->profileComments()->find($profile_comment_id);
        $comment->delete();
        return redirect('profile_comments')->with('notice',['class'=>'success','message'=>'Comment deleted']);
    }

    public function approve($profile_comment_id){
        $comment = $this->user->profileComments()->find($profile_comment_id);
        $comment->approved = 1;
        $comment->save();
        return redirect('profile_comments')->with('notice',['class'=>'success','message'=>'Comment approved']);
    }
    public function disapprove($profile_comment_id){
        $comment = $this->user->profileComments()->find($profile_comment_id);
        $comment->approved = 0;
        $comment->save();
        return redirect('profile_comments')->with('notice',['class'=>'success','message'=>'Comment disapproved']);
    }
}

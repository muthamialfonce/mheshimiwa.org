<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

use Auth;

class CommentController extends Controller
{
	protected $user;
	protected $folder="posts.";

    public function __construct()
    {
      $this->user = Auth::user();
    }

    //    public function index()
    //   {
    // $comments = Comment::all();
    // return view($this->folder.'index',[
    //        'comments'=>$comments
    // 	]);
    //   }

    public function store(Request $request)
    {
//      // $id=$_GET['postid'];
//      // var_dump($id); exit;
//      $this->user->comments()->updateOrCreate(['id'=>$request->id],[
//       'content'=>$request->content,
//       'post_id'=>$request->postid
//      	]);
//      return redirect("post")->with('notice',['class'=>'success', 'message'=>'Saved']);
    }

    public function destroy(Comment $comment)
    {
    $comment->delete();
    return redirect("post")->with('notice',['class'=>'success','message'=>'Post Deleted']);
    }
}

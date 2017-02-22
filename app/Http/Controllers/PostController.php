<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use App\Comment;

use Auth;
use App\Repositories\RoleRepository;

class PostController extends Controller
{
    protected $user;
    protected $folder="posts.";

    public function __construct()
    {
    	        $role = new RoleRepository();
        $role->check();
    	$this->user =Auth::user();
      
    }

    public function index()
    {
  $posts=Post::orderBy('created_at','desc')->get();
  $comments=Comment::orderBy('created_at','asc')->get();
  return view($this->folder.'index',[
    'posts'=>$posts,
    'comments'=>$comments
  	]);
    }

    public function store(Request $request)
    {
      $this->user->posts()->updateOrCreate(['id'=>$request->id],[
       'content'=>$request->contents,
      	]);
      return redirect("post")->with('notice',['class'=>'success', 'message'=>'Saved']);
    }

    public function destroy(Post $post)
    {
    $post->delete();
    return redirect("post")->with('notice',['class'=>'success','message'=>'Post Deleted']);
    }
}

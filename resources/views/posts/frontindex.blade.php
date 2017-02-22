
@extends('layouts.colate')
@section('sub-title')
    
    @endsection
@section('content')
<style>
#container{
    overflow: auto;
    height: 500px;
}
#comment{
    font-size: 12px;
    min-height: 60px;
    min-width: 300px;
    border-collapse: 10px;
    background-color:#B9D3EE;
    border-radius: 07px;
    padding: 5px;
}
#post{
    font-size: 12px;
    min-height: 60px;
    min-width: 300px;
    border-collapse: 10px;
    background-color:#EED2EE;
    border-radius: 07px;
    padding: 5px;
}
.date{
    font-style: italic;
        width: 80px;
    border-collapse: collapse;
}

</style>
@if(Auth::user()->role=='politician')
<button onclick="return newPost();" class="btn btn-info"><i class="fa fa-plus"></i>New Post</button>
@endif
<div id ="container">
@foreach($posts as $post)
    <table class="table table-striped" class="col-md-3">

        <thead class="col-md-3">
        <tr>
            <th><div id="post">{{ $post->content }}</div></th>
            <th><div class="date">{{ $post->created_at }}</div></th>
            @if(Auth::user()->id==$post->user->id)
            <th><div >
                    <i onclick="return editPost({{ $post->id }},'<?php echo  str_replace("'"," ",$post->content) ?>');"><i class="fa fa-edit"></i></i><br>
                    <a href="{{ URL::to("post/delete/$post->id") }}" onclick="return confirm('Are you sure?');" ><i class="fa fa-trash"></i></a>
                </div></th>
                @endif
       
        </tr>
        </thead>
<button onclick="return newComment({{ $post->id }});" class="btn btn-default btn-xs"><i class="fa fa-edit"></i>Add comment</button>
    </table>
    @foreach($post->comments as $comment)
        <table class="table table-striped" class="col-md-3">
        <thead class="col-md-3">
        <tr>
            <td><div id="comment">{{ $comment->content }}</div></td>
            <td><div class="date">@if($comment->user->id==Auth::user()->id)<b>{{ "Me" }}</b> @else<b>{{$comment->user->name}}</b>@endif<br>{{ $comment->created_at }}</div></td>
            @if(Auth::user()->id==$comment->user->id)
            <td><div>
                    <i onclick="return editComment({{ $comment->id }},'<?php echo  str_replace("'"," ",$comment->content) ?>');"><i class="fa fa-edit"></i></i><br>
                    <a href="{{ URL::to("comment/delete/$comment->id") }}" onclick="return confirm('Are you sure?');" ><i class="fa fa-trash"></i></a>
                </div></td>
                @endif
       
        </tr>
        </thead>

    </table>

    @endforeach

    @endforeach

    {{--comments modal form--}}
  <div class="modal fade" id="comment_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    comment</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post" action="{{URL::To("comment/")}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <input type="hidden" name="postid">
                        <div class="form-group">
                            <label class="control-label col-md-3">Comment</label>
                            <div class="col-md-6">
                                <textarea required type="text" name="content" class="form-control"></textarea>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <button class="btn btn-danger btn pull-right" data-dismiss="modal">cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

{{-- posts modal form  --}}
<div class="modal fade" id="post_form_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="btn btn-danger btn-sm pull-right" data-dismiss="modal">&times;</a>
                    Post</div>
                <div class="modal-body">
                    <form class="form-horizontal" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label class="control-label col-md-3">Post</label>
                            <div class="col-md-6">
                                <textarea required type="text" name="content" class="form-control"></textarea>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-md-3">&nbsp;</label>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <button class="btn btn-danger btn pull-right" data-dismiss="modal">cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
    </div>



    <script type="text/javascript">
        function newPost(){
            $("input[name='id']").val('');
            $("textarea[name='content']").val('');
            $("#post_form_modal").modal('show');
        }
        function editPost(id,content){
            $("input[name='id']").val(id);
            $("textarea[name='content']").val(content);
            $("#post_form_modal").modal('show');
        }

        function newComment(postid){
            $("input[name='id']").val('');
            $("input[name='postid']").val(postid);
            $("textarea[name='content']").val('');
            $("#comment_form_modal").modal('show');
        }
        function editComment(id,content){
            $("input[name='id']").val(id);
            $("textarea[name='content']").val(content);
            $("#comment_form_modal").modal('show');
        }
    </script>

@endsection
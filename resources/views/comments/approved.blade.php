<table class="table table-condensed table-bordered">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Comment</th>
        <th>&nbsp;</th>
    </tr>
    <?php $no = 1; ?>
    @foreach($approved as $comment)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $comment->subscriber->name }}</td>
            <td>{{ $comment->subscriber->email }}</td>
            <td>{{ $comment->comment }}</td>
            <td>
                <a onclick="return confirm('Are you sure?');" class="btn btn-danger btn-xs" href="{{ URL::to("profile_comments/disapprove/$comment->id") }}" title="Approve Comment"><i class="fa fa-thumbs-down"></i> Disapprove</a>
            </td>
        </tr>
        @endforeach
</table>
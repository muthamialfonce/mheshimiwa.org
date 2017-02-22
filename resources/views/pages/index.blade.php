
@extends('layouts.gentella')
@section('title')
    Page Management
@endsection
@section('content')
    <a class="btn btn-info" href="{{ URL::to('pages/add?page_type=page') }}"><i class="fa fa-plus"></i> Add Page</a>
    <table class="table table-striped table-condesed">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Created By</th>
            <th>On</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $no=1; ?>
        @foreach($pages as $page)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $page->title }}</td>
                <td>{{ $page->user->name }}</td>
                <td>{{ date('M, Y d H:i', strtotime($page->created_at)) }}</td>
                <td>
                    <a href="{{ URL::to("pages/edit/$page->id?pages/add?page_type=page") }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                    <a onclick="return confirm('Are you sure? \n This is irreversible!');" href="{{ URL::to("pages/delete/$page->id") }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
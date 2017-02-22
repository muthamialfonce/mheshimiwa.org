
@extends('layouts.gentella')
@section('title')
    Edit/Create Page
@endsection
@section('content')
    <div class="row"></div>
    <form class="form-horizontal" method="post" action="{{ URL::to("pages/add") }}">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $page->id }}">
            <input type="hidden" name="page_type" value="page">
            <label class="control-label col-md-1" for="title">Menu Label</label>
            <div class="col-md-6">
                <input required type="text" name="menu_label" class="form-control" value="{{ $page->menu_label or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1" for="title">Title</label>
            <div class="col-md-6">
                <input required type="text" name="title" class="form-control" value="{{ $page->title or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1" for="title">Content</label>
            <div class="col-md-9">
                <textarea name="page_content">{{ $page->page_content or "" }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1" for="title">Keywords</label>
            <div class="col-md-6">
                <input required type="text" name="keywords" class="form-control" value="{{ $page->keywords or "" }}">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1" for="title">Meta Description</label>
            <div class="col-md-6">
                <textarea class="form-control" name="meta_description">{{ $page->meta_description or "" }}</textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-md-1" for="title">&nbsp;</label>
            <div class="col-md-6">
                <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        tinymce.init({
            selector: 'textarea[name="page_content"]',
            height: 500,
            theme: 'modern',
            plugins: [
                'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview media | forecolor backcolor emoticons',
            image_advtab: true,
            templates: [
                { title: 'Test template 1', content: 'Test 1' },
                { title: 'Test template 2', content: 'Test 2' }
            ],
            content_css: [
                '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
                '//www.tinymce.com/css/codepen.min.css'
            ]
        });
    </script>
@endsection
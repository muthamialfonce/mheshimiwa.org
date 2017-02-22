<?php
$meta_description = $page->meta_description;
?>
@extends('layouts.colate')

@section('title')
{{ $page->title }}
@endsection

@section('content')
<h3 class="page_title">{{ $page->title }}</h3>
{!! $page->page_content !!}
@endsection


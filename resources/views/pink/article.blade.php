@extends('layouts.site')

@section('header')
	@include('pink.header')
@endsection

@section('content')
	@include('pink.content_article')
@endsection

@section('sidebar')
	@include('pink.sidebar_articles')
@endsection
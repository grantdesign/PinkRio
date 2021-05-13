@extends('layouts.site')

@section('header')
	@include('pink.header')
@endsection

@section('content')
	@include('pink.content_articles')
@endsection

@section('sidebar')
	@include('pink.sidebar_articles')
@endsection
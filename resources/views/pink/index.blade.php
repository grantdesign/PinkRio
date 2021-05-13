@extends('layouts.site')

@section('header')
	@include('pink.header')
@endsection

@section('slider')
	@include('pink.slider')
@endsection

@section('content')
	@include('pink.content_index')
@endsection

@section('sidebar')
	@include('pink.sidebar_index')
@endsection
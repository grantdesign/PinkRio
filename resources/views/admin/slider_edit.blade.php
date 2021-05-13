@extends('layouts.admin')

@section('header')
	@include('admin.header')
@endsection

@section('right_sidebar')
	@include('admin.right_sidebar')
@endsection

@section('left_sidebar')
	@include('admin.left_sidebar')
@endsection

@section('content')
	@include('admin.content_slider_edit')
@endsection
@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('breadcrumb')
	<li> <a href="/dashboard" > Dashboard</a> </li>
	<li> <a href="{{ route('admin.members.index') }}" >Manage</a> </li>
	<li class="uk-active" > {{ $title }} </li>
@stop

@section('content')
	{{ Form::open(array('url' => route('admin.members.store'), 'method' => 'post', 'class'=>'uk-form uk-form-horizontal')) }}
	
		@include('members._form')
	
	{{ Form::close() }}
@stop
@extends('layouts.master')

@section('title')
	{{ $title }}

@stop

@section('asset')
	@include('layouts.partials.select2')
@stop

@section('breadcrumb')
	<li><a href="/dashboard">Dashboard</a></li>
	<li><a href="{{ route('admin.transactions.index') }}">Transactions</a></li>
	<li class="uk-active">{{ $title }}</li>
@stop

@section('content')
	{{ Form::open(array('url' => route('admin.transactions.store'), 'method' => 'post', 'class'=>'uk-form uk-form-horizontal')) }}
	
		@include('transactions._form')
	
	{{ Form::close() }}
@stop

	
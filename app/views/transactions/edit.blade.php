@extends('layouts.master')

@section('title')
	{{ $title }}
@stop

@section('asset')
	@include('layouts.partials.select2')
@stop

@section('breadcrumb')
	<li > <a href="/dashboard" > Dashboard</a> </li>
	<li > <a href="{{ route('admin.transactions.index') }}" > Transactions</a> </li>
	<li class="uk-active" > {{ $title }} </li>
@stop

@section('content')
	{{ Form::model($transaction, array('url' => route('admin.transactions.update', ['transactions'=>$transaction->id]), 'method' => 'put', 'class'=>'uk-form uk-form-horizontal')) }}
		@include('transactions._form')
	{{ Form::close() }}
@stop
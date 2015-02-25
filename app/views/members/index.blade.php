@extends('layouts.master')

@section('asset')
	@include('layouts/partials/datatable')
@stop

@section( 'title' )
	{{ $title }}
@stop

@section('nav')
	
	<li> <a href="#" >Member</a> </li>
	<li> <a href="#" >Point</a> </li>
	
	<li class="uk-active"><a href="{{URL::to('/admin/members')}}" class="uk-navbar-nav-subtitle"><center>Admin</center>
		<div>Manage</div>
        </a>
    </li>
    <li><a href="{{URL::to('/admin/transactions')}}" class="uk-navbar-nav-subtitle"><center>Transaction</center>
		<div> History Transactions</div>
        </a>
    </li>
@stop

@section('title-button')
	{{ HTML::buttonAdd() }}
@stop

@section( 'breadcrumb' )
	<li> Dashboard</li >
	<li> {{ $title }} </li >
@stop

@section( 'content' )
	<i class="uk-icon-spin uk-icon-spinner"></i> Show Members
	<br>
	{{ Datatable:: table()
		->addColumn( 'id' , 'Nama' , '' )
		->setOptions( 'aoColumnDefs' , array(
			array(
				'bVisible' => false,
				'aTargets' => [ 0]),
			array(
				'sTitle' => 'Nama' ,
				'aTargets' => [ 1 ]),
			array(
				'bSortable' => false,
				'aTargets' => [ 2])
			))
		-> setOptions( 'bProcessing' , true)
		-> setUrl (route( 'admin.members.index' ))
		-> render('datatable.uikit') }}

@stop
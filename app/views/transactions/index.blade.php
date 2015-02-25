@extends( 'layouts.master' )

@section( 'asset' )
	@include( 'layouts.partials.datatable' )
@stop

@section( 'title' )
	{{ $title }}
@stop

@section( 'title-button' )
	{{ HTML:: buttonAdd() }}
@stop

@section( 'breadcrumb' )
	<li><a href=" /dashboard" > Dashboard</a></li >
	<li class=" uk-active" > {{ $title }} </li >
@stop

@section( 'content' )
<i class="uk-icon-spin uk-icon-spinner"></i> Show Transactions

{{ Datatable:: table()
	-> addColumn( 'id' , 'member' , 'product_types' , 'total_price' , 'point','')
	-> setOptions( 'aoColumnDefs' , array(
		array(
			'bVisible' => false,
			'aTargets' => [0]),
		array(
			'sTitle' => 'Member' ,
			'aTargets' => [1]),
		array(
			'sTitle' => 'Jumlah Tipe' ,
			'aTargets' => [2]),
		array(
			'sTitle' => 'Total Price' ,
			'aTargets' => [3]),
		array(
			'sTitle' => 'Point' ,
			'aTargets' => [4]),
		//array(
		//	'sTitle' => 'Tanggal Transaksi' ,
		//	'aTargets' => [5]),
		array(
			'bSortable' => false,
			'aTargets' => [5])
))
	-> setOptions( 'bProcessing' , true)
	-> setUrl (route( 'admin.transactions.index' )) // this is the route where data will be retrieved
	-> render( 'datatable.uikit' ) }}
@stop
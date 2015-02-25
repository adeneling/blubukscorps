@extends( 'layouts.master' )

@section( 'title' )
	{{ $title }}
@stop

@section( 'breadcrumb' )
<li><a href=" /dashboard" > Dashboard</a></li >
<li><a href=" {{ route('admin.members.index') }} " > Manage</a></li >
<li class=" uk-active" > {{ $title }} </li >
@stop

@section( 'content' )
{{ Form:: model ( $member, array( 'url' => route( 'admin.members.update' , [ 'members' => $member-> id]), 'method' => 'put' , 'class' => 'uk-form uk-form-horizontal' )) }}
@include( 'members._form' )
{{ Form:: close() }}
@stop
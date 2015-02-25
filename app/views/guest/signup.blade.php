@extends('layouts.guest')

@section('content')
	<div class="uk-text-center" >
		<div class="uk-vertical-align-middle" style="width: 500px;" >
		@include('layouts.partials.validation')
		{{ Form::open(array('url' => route('guest.register'), 'class' => 'uk-form uk-form-horizontal')) }}
			<div class="uk-panel uk-panel-box">
				@include('guest._form')
			</div>

		{{ Form::close() }}
		</div>
	</div>
@stop
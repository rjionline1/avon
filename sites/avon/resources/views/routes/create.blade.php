@extends('main')

@section('title', 'Create New Route')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Create New Route</h1>
			<hr>

			{!! Form::open(['route' => 'routes.store', 'data-parsley-validate' => '']) !!}
			    {{ Form::label('name', 'Name:') }}
			    {{ Form::text('name', null, ['class' => 'form-control']) }}

			    {{ Form::submit('Create route', ['class' => 'btn btn-success btn-lg btn-block marg-top']) }}
			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection

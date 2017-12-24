@extends('main')

@section('title', 'Create New Customer')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Customer</h1>
			<hr>

			{!! Form::open(['route' => 'customers.store', 'data-parsley-validate' => '']) !!}
			    {{ Form::label('name', 'Name:') }}
			    {{ Form::text('name', null, ['class' => 'form-control']) }}

			    {{ Form::label('email', 'Email:') }}
			    {{ Form::text('email', ' ', ['class' => 'form-control']) }}

			    {{ Form::label('phone', 'Phone Number:') }}
			    {{ Form::text('phone', ' ', ['class' => 'form-control']) }}

			    {{ Form::label('cell', 'Cell Number:') }}
			    {{ Form::text('cell', ' ', ['class' => 'form-control']) }}

			    {{ Form::label('address', 'Address:') }}
			    {{ Form::text('address', ' ', ['class' => 'form-control']) }}

			    {{ Form::label('city', 'City:') }}
			    {{ Form::text('city', ' ', ['class' => 'form-control']) }}

			    {{ Form::label('route_id', 'Route:') }}
			    {{ Form::select('route_id', $routes, null, ['class' => 'form-control']) }}

			    {{ Form::label('qty', 'Number Books:') }}
			    {{ Form::text('qty', ' ', ['class' => 'form-control']) }}

			    {{ Form::submit('Create Customer', ['class' => 'btn btn-success btn-lg btn-block marg-top']) }}
			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection

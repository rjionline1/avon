@extends('main')

@section('title', 'Sales Tracker')

@section('stylesheets')
	{!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create New Sale</h1>
			<hr>

			{!! Form::open(['route' => 'sales.store', 'data-parsley-validate' => '']) !!}
			    {{ Form::label('sales_year', 'Sales Year:') }}
			    {{ Form::text('sales_year', null, ['class' => 'form-control', 'required', 'maxlength="255"']) }}

			    {{ Form::label('campaign_no', 'Campaign No:') }}
			    {{ Form::text('campaign_no', null, ['class' => 'form-control', 'required', 'maxlength="255"']) }}

			    {{ Form::label('campaign_sales', 'Campaign Sales:') }}
			    {{ Form::text('campaign_sales', null, ['class' => 'form-control', 'required', 'maxlength="255"']) }}

			    {{ Form::label('sales_target', 'Sales Target:') }}
			    {{ Form::text('sales_target', null, ['class' => 'form-control', 'required', 'maxlength="255"']) }}

			    {{ Form::submit('Create Sale', ['class' => 'btn btn-success btn-lg btn-block marg-top']) }}
			{!! Form::close() !!}

		</div>
	</div>

@endsection

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
@endsection

@extends('main')

@section('title', 'Edit Sale')

@section('content')

	<div class="row">

		{!! Form::model($sale, ['route' => ['sales.update', $sale->id], 'method' => 'PUT']) !!}

			<div class="col-md-8">
				{{ Form::label('sales_year', 'Sales Year:') }}
				{{ Form::text('sales_year', null, ['class'=>'form-control input-lg']) }}
				{{ Form::label('campaign_no', 'Campaign No:') }}
				{{ Form::text('campaign_no', null, ['class'=>'form-control']) }}
				{{ Form::label('campaign_sales', 'Campaign Sales:') }}
				{{ Form::text('campaign_sales', null, ['class'=>'form-control']) }}
				{{ Form::label('sales_target', 'Sales Target:') }}
				{{ Form::text('sales_target', null, ['class'=>'form-control']) }}
			</div>

			<div class="col-md-4">
				<div class="well">
					<dl class="horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y g:i a', strtotime($sale->created_at)) }}</dd>
					</dl>
					<dl class="horizontal">
						<dt>Updated At:</dt>
						<dd>{{ date('M j, Y g:i a', strtotime($sale->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('sales.show', 'Cancel', [$sale->id], ['class'=>'btn btn-danger btn-block']) !!}
						</div>
						<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class'=>'btn btn-success btn-block']) }}
						
						
						</div>
					</div>
				</div>
			</div>

		{!! Form::close() !!}

	</div>

@endsection
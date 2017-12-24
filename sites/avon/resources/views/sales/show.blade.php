@extends('main')

@section('title', 'View Sales')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $sale->sales_year }}</h1>
			<p class="lead"><strong>Campaign No:</strong> {{ $sale->campaign_no }}</p>
			<p class="lead"><strong>Campaign Sales:</strong> {{ $sale->campaign_sales }}</p>
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
						{!! Html::linkRoute('sales.edit', 'Edit', [$sale->id], ['class'=>'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['sales.destroy', $sale->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkroute('sales.index', '<< See All Sales', [], ['class' => 'btn btn-default btn-block marg-top']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
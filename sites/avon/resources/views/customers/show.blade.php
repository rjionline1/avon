@extends('main')

@section('title', 'View Customer')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>{{ $customer->name }}</h1>
			<p class="lead"><strong>Customer No:</strong> {{ $customer->id }}</p>
			<p class="lead"><strong>Email:</strong> {{ $customer->email }}</p>
			<p class="lead"><strong>Phone:</strong> {{ $customer->phone }}</p>
			<p class="lead"><strong>Cell:</strong> {{ $customer->cell }}</p>
			<p class="lead"><strong>Address:</strong> {{ $customer->address }}</p>
			<p class="lead"><strong>City:</strong> {{ $customer->city }}</p>
			<p class="lead"><strong>Route:</strong> {{ $customer->route->name }}</p>
			<p class="lead"><strong>Number Books:</strong> {{ $customer->qty }}</p>
		</div>

		<div class="col-md-4">
			<div class="well">
				<dl class="horizontal">
					<dt>Created At:</dt>
					<dd>{{ date('M j, Y g:i a', strtotime($customer->created_at)) }}</dd>
				</dl>
				<dl class="horizontal">
					<dt>Updated At:</dt>
					<dd>{{ date('M j, Y g:i a', strtotime($customer->updated_at)) }}</dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('customers.edit', 'Edit', [$customer->id], ['class'=>'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['customers.destroy', $customer->id], 'method' => 'DELETE']) !!}

						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkroute('customers.index', '<< See All Customers', [], ['class' => 'btn btn-default btn-block marg-top']) }}
					</div>
				</div>

			</div>
		</div>
	</div>

@endsection
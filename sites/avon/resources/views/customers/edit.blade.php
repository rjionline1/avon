@extends('main')

@section('title', 'Edit Customer')

@section('content')

	<div class="row">

		{!! Form::model($customer, ['route' => ['customers.update', $customer->id], 'method' => 'PUT']) !!}

			<div class="col-md-8">
				{{ Form::label('name', 'Customer Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control input-lg']) }}
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email', null, ['class'=>'form-control']) }}
				{{ Form::label('phone', 'Phone:') }}
				{{ Form::text('phone', null, ['class'=>'form-control']) }}
				{{ Form::label('cell', 'Cell:') }}
				{{ Form::text('cell', null, ['class'=>'form-control']) }}
				{{ Form::label('address', 'Address:') }}
				{{ Form::text('address', null, ['class'=>'form-control']) }}
				{{ Form::label('city', 'City:') }}
				{{ Form::text('city', null, ['class'=>'form-control']) }}
				{{ Form::label('route_id', 'Route:') }}
				{{ Form::select('route_id', $routes, null, ['class'=>'form-control']) }}
				{{ Form::label('qty', 'Number Books:') }}
				{{ Form::text('qty', null, ['class'=>'form-control']) }}
			</div>

			<div class="col-md-4 marg-top">
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
							{!! Html::linkRoute('customers.show', 'Cancel', [$customer->id], ['class'=>'btn btn-danger btn-block']) !!}
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
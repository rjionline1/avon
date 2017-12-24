@extends('main')

@section('title', 'Edit Route')

@section('content')

	<div class="row">

		{!! Form::model($route, ['route' => ['routes.update', $route->id], 'method' => 'PUT']) !!}

			<div class="col-md-8">
				{{ Form::label('name', 'Route Name:') }}
				{{ Form::text('name', null, ['class'=>'form-control input-lg']) }}
			</div>

			<div class="col-md-4 marg-top">
				<div class="well">
					<dl class="horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y g:i a', strtotime($route->created_at)) }}</dd>
					</dl>
					<dl class="horizontal">
						<dt>Updated At:</dt>
						<dd>{{ date('M j, Y g:i a', strtotime($route->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('routes.show', 'Cancel', [$route->id], ['class'=>'btn btn-danger btn-block']) !!}
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
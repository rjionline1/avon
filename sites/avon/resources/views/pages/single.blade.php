@extends('main')

@section('title', 'single')

@section('content')
	@foreach ($customers as $customer)
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>{{ $customer->name }}</h1>
			</div>
		</div>
	@endforeach
@endsection
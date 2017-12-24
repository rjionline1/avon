@extends('main')

@section('title', 'Home')	

@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
			  <h1>Denise Avon</h1>
			  <p>Customer Management System</p>
			</div>
		</div>
	</div>

	<h1>YTD Sales: ${{ $sales }}</h1>

	<a href="/sales" class="btn btn-success btn-lg">View Sales Report</a>

	<div class="row">
		<div class="col-md-8">
			
		</div>
		<div class="col-md-3 col-md-offset-1">
			
		</div>
	</div>
@endsection
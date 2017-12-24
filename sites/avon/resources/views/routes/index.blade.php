@extends('main')

@section('title', 'All Routes')

@section('content')

	<div class="row">
		<div class="col-md-8">
			<h1>Route List</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('routes.create') }}" class="btn btn-lg btn-primary btn-block marg-top">New route</a>
		</div>
		<hr>
	</div> <!--end of row-->

	<div class="row">
		<div class="col-md-8">
			<table class="table">
				<thead>
					<th>Name</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($routes as $route)
						<tr>
							<td>{{ $route->name }}</th>
							<td style="width:20%"><a href="{{ route('routes.show', $route->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('routes.edit', $route->id) }}" class="btn btn-default btn-sm">Edit</a>
						</tr>
					@endforeach
				</tbody>
			</table>

			<p class="center">Page {{$routes->currentPage()}} of {{$routes->lastpage()}} Pages</p>

			<div class="text-center">
				{!! $routes->links(); !!}
			</div>
			
		</div>
	</div>

@endsection
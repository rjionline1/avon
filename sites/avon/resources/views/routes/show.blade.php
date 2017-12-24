@extends('main')

@section('title', ' Show Route')

@section('content')

<div class="row">
		<div class="col-md-8">
			<h1>{{ $route->name }} Route</h1>
			<hr>
			<div class="row">
				<div class="col-md-8">
					<table class="table">
						<thead>
							<th>Qty</th>
							<th>Name</th>
							<th>Address</th>
							<th style="width: 30%;" ></th>
						</thead>
						<tbody>
							@foreach($customers as $customer)
								<tr>
									<td>{{$customer->qty}}</td>
									<td>{{$customer->name}}</td> 
									<td>{{$customer->address}}</td>
									<td><a href="{{ route('customers.show', $customer->id) }}" class="btn btn-default btn-sm hidden-print">View</a> <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-default btn-sm hidden-print">Edit</a></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>

		</div>



		<div class="col-md-4">
			<div class="well hidden-print">
			
				</dl>
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
						{!! Html::linkRoute('routes.edit', 'Edit', [$route->id], ['class'=>'btn btn-primary btn-block']) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route' => ['routes.destroy', $route->id], 'method' => 'DELETE', 'onclick' => "return confirm('Are you sure you want to delete this item?')"]) !!}

						{!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block']) !!}

						{!! Form::close() !!}
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						{{ Html::linkroute('routes.index', '<< See All routes', [], ['class' => 'btn btn-default btn-block marg-top']) }}
					</div>
				</div>

			</div>
		</div>
	</div>


			<p class="center hidden-print">Page {{$customers->currentPage()}} of {{$customers->lastpage()}} Pages</p>

			<div class="text-center">
				{!! $customers->links(); !!}
			</div>

@endsection
@extends('main')

@section('title', 'All Customers')	

@section('content')
<div class="row">
	<form class="navbar-form navbar-left">
		<div class="form-group">
		  	<select class="form-control" id="customers" onChange="if (this.value) window.location.href='customers/'+ this.value">
			  @foreach($search as $customer)
			  	<option value={{$customer->id}}>{{$customer->name}}</option>
			  @endforeach
			</select>
		</div>
	<strong>Search</strong>
		<!--<script>
			var x = document.getElementById("customers").selectedIndex;
			//alert(document.getElementsByTagName("option")[x].value);
		</script>

		<a href="{{ route('customers.show', $customer->id) }}" class="btn btn-default">Search1</a>
		<a href="customers/117" class="btn btn-default">Search2</a>
		<button type="submit" class="btn btn-default">Search3</button> -->
	</form>
</div>

	<div class="row">
		<div class="col-md-10">
			<h1>Customer List</h1>
		</div>
		<div class="col-md-2">
			<a href="{{ route('customers.create') }}" class="btn btn-lg btn-primary btn-block marg-top">New Customer</a>
		</div>
		<hr>
	</div> <!--end of row-->

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>Phone</th>
					<th>Cell</th>
					<th>Address</th>
					<th>City</th>
					<th>Route</th>
					<th>Created At</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($customers as $customer)
						<tr>
							<th>{{ $customer->id }}</th>
							<td>{{ $customer->name }}</th>
							<td>{{ $customer->email }}</th>
							<td>{{ $customer->phone }}</th>
							<td>{{ $customer->cell }}</th>
							<td>{{ $customer->address }}</th>
							<td>{{ $customer->city }}</th>
							<td>{{ $customer->route->name }}</th>
							<td>{{ date('M j, Y g:i a', strtotime($customer->created_at)) }}</th>
							<td><a href="{{ route('customers.show', $customer->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-default btn-sm">Edit</a>
						</tr>
					@endforeach
				</tbody>
			</table>

			<p class="center">Page {{$customers->currentPage()}} of {{$customers->lastpage()}} Pages</p>

			<div class="text-center">
				{!! $customers->links(); !!}
			</div>
			
		</div>
	</div>

@endsection
@extends('main')

@section('title', 'All Sales')	

@section('content')
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Sales Report</h1>
			<h2>Total Sales YTD: ${{ $total }} vs. Target of: ${{ $target->sales_target }}</h2>
		</div>
		<div class="col-md-2">
			<a href="{{ route('sales.create') }}" class="btn btn-lg btn-primary btn-block marg-top">New Sale</a>
		</div>
		<hr>
	</div> <!--end of row-->

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<table class="table">
				<thead>
					<th>Sales Year</th>
					<th>Campaign No</th>
					<th>Campaign Sales</th>
					<th></th>
				</thead>

				<tbody>
					@foreach ($sales as $sale)
						<tr>
							<th>{{ $sale->sales_year }}</th>
							<td>{{ $sale->campaign_no }}</th>
							<td>${{ $sale->campaign_sales }}</th>
							<td><a href="{{ route('sales.show', $sale->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-default btn-sm">Edit</a>
						</tr>
					@endforeach
				</tbody>
			</table>

			<p class="center">Page {{$sales->currentPage()}} of {{$sales->lastpage()}} Pages</p>

			<div class="text-center">
				{!! $sales->links(); !!}
			</div>
			
		</div>
	</div>

@endsection
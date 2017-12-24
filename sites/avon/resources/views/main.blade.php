<!DOCTYPE html>
<html lang="en">

	<head>

		@include('partials._head')

	</head>

  	<body>

	@include('partials._nav')

		<!--jumbotron container-->
		<div class="container">

		@include('partials._messages')

		@yield('content')


	@include('partials._footer')

	</div>
	<!--end of jumbotron container-->

		@include('partials._javascript')

	</body>
</html>
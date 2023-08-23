<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="X-UA-Compatible" content="IE=9" />
		<meta name="Description" content="Valex – Laravel Admin & Dashboard Template">
		<meta name="Author" content="SPRUKO™">
		<meta name="Keywords" content="laravel admin panel, laravel admin panel template, laravel admin dashboard template, laravel bootstrap admin template, laravel ui, laravel dashboard, laravel dashboard template, admin, admin template, bootstrap dashboard, bootstrap 5 admin template, laravel blade, laravel blade template bootstrap, php laravel, laravel mix"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Title -->
		<title> {{ trans('general.kher_academy') }}</title>

		<!-- styles -->
        @include('layouts.custom-styles')

    </head>

	<body class="main-body">

		@yield('class')

			<!-- Loader -->
			<div id="global-loader">
				<img src="{{asset('assets/img/brand/logo-1.png')}}" class="loader-img" alt="Loader">
			</div>
			<!-- /Loader -->

			<!-- Page -->
			<div class="page">

				@yield('content')

			</div>

			<!-- scripts -->
			@include('layouts.custom-scripts')

		</div>
		<!-- class -->

    </body>

</html>

@extends('layouts.app')

@section('styles')

        <!-- Internal Morris Css-->
		<link href="{{asset('assets/plugins/morrisjs/morris.css')}}" rel="stylesheet">

@endsection

@section('content')

					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div class="my-auto">
							<div class="d-flex">
								<h4 class="content-title mb-0 my-auto">Charts</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Sparkline-chart</span>
							</div>
						</div>
						<div class="d-flex my-xl-auto right-content">
							<div class="mb-xl-0" id="p-r-c-1">
								<button type="button" class="btn btn-info btn-icon btn-b" id="m-l-c-05"><i class="mdi mdi-filter-variant"></i></button>
							</div>
							<div class="mb-xl-0" id="p-r-c-1">
								<button type="button" class="btn btn-danger btn-icon" id="m-l-c-05"><i class="mdi mdi-star"></i></button>
							</div>
							<div class="mb-xl-0" id="p-r-c-1">
								<button type="button" class="btn btn-warning btn-icon" id="m-l-c-05"><i class="mdi mdi-refresh"></i></button>
							</div>
							<div class="mb-xl-0">
								<div class="btn-group dropdown">
									<button type="button" class="btn btn-primary">14 Aug 2019</button>
									<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate" x-placement="bottom-end">
										<a class="dropdown-item" href="#">2015</a>
										<a class="dropdown-item" href="#">2016</a>
										<a class="dropdown-item" href="#">2017</a>
										<a class="dropdown-item" href="#">2018</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- breadcrumb -->

					<!-- row -->
					<div class="row row-sm">
						<div class="col-lg-6">
							<div class="card mg-b-20 overflow-hidden">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Line Chart
									</div>
									<p class="mg-b-20">Below is the basic line chart example.</p>
									<div class="d-sm-flex">
										<div class="mg-sm-l-30">
											<span id="sparkline1">3,4,4,7,5,9,10,6,4,4,7,5,9,10</span>
										</div>
										<div class="mg-t-20 mg-sm-t-0">
											<span id="sparkline2">3,4,4,7,5,9,10,6,4,4,7,5,9,10</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- col-->
						<div class="col-lg-6">
							<div class="card mg-b-20 overflow-hidden">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Area Chart
									</div>
									<p class="mg-b-20">Below is the area bar chart example.</p>
									<div class="d-sm-flex">
										<div class="mg-sm-l-30">
											<span id="sparkline3">7,8,10,7,5,9,10,6,9,4,7,5,9,10,8</span>
										</div>
										<div class="mg-t-20 mg-sm-t-0">
											<span id="sparkline4">3,4,4,7,5,9,10,6,4,4,7,5,9,10,8</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row row-sm">
						<div class="col-lg-6">
							<div class="card mg-b-20 overflow-hidden">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Bar Chart
									</div>
									<p class="mg-b-20">Below is the basic bar chart example.</p>
									<div class="d-sm-flex">
										<div class="mg-sm-l-30">
											<span id="sparkline5">3,4,4,7,5,9,10,6,4,4,7,5,9,10</span>
										</div>
										<div class="mg-t-20 mg-sm-t-0">
											<span id="sparkline6">3,4,4,7,5,9,10,6,4,4,7,5,9,10</span>
										</div>
									</div>
								</div>
							</div>
						</div><!-- col-->

						<div class="col-lg-6">
							<div class="card mg-b-20 overflow-hidden">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Stacked Bar Chart
									</div>
									<p class="mg-b-20">Below is the basic stacked bar chart example.</p>
									<div class="d-sm-flex">
										<div class="mg-sm-l-30">
											<span id="sparkline7">7,8,10,7,5,9,10,6,9,4,7,5,9,10,8</span>
										</div>
										<div class="mg-t-20 mg-sm-t-0">
											<span id="sparkline8">3,4,4,7,5,9,10,6,4,4,7,5,9,10,8</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row row-sm">
						<div class="col-md-12">
							<!-- div -->
							<div class="card">
								<div class="card-body">
									<div class="main-content-label mg-b-5">
										Pie Chart
									</div>
									<p class="mg-b-20">An example of a pie chart with two series.</p>
									<div class="d-flex">
										<div class="mg-l-30">
											<span id="sparkline9">3,4,4</span>
										</div>
										<div>
											<span id="sparkline10">3,4,4,7,5,9</span>
										</div>
									</div>
								</div>
							</div>
						<!-- /div -->
						</div><!-- col-6 -->
					</div>
					<!-- row closed -->

@endsection('content')

@section('scripts')

		<!-- Internal Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>

		<!-- Internal Jquery-sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
		<script src="{{asset('assets/js/chart.sparkline.js')}}"></script>

@endsection

@extends('layouts.app')

@section('styles')

		<!-- Internal Ion.rangeSlider css -->
		<link href="{{asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

@endsection

@section('content')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Rangeslider</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
						<div class="mb-xl-0" id="p-r-c-1">
							<button type="button" class="btn btn-info btn-icon btn-b" id="m-l-c-05"><i
									class="mdi mdi-filter-variant"></i></button>
						</div>
						<div class="mb-xl-0" id="p-r-c-1">
							<button type="button" class="btn btn-danger btn-icon" id="m-l-c-05"><i
									class="mdi mdi-star"></i></button>
						</div>
						<div class="mb-xl-0" id="p-r-c-1">
							<button type="button" class="btn btn-warning btn-icon" id="m-l-c-05"><i
									class="mdi mdi-refresh"></i></button>
						</div>
						<div class="mb-xl-0">
							<div class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split"
									id="dropdownMenuDate" data-bs-toggle="dropdown" aria-haspopup="true"
									aria-expanded="false">
									<span class="sr-only">Toggle Dropdown</span>
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate"
									x-placement="bottom-end">
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

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">

						<!--div-->
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Range Slider (Modern Skin)
								</div>
								<p class="mg-b-20">It is the modern skin range slider of Redash.</p>
								<div class="row row-sm">
									<div class="col-lg-12">
										<input class="rangeslider1" data-extra-classes="irs-modern" name="example_name"
											type="text">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider2" data-extra-classes="irs-modern" name="example_name"
											type="text">
									</div>
								</div>
								<div class="row row-sm">
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider3" data-extra-classes="irs-modern" name="example_name"
											type="text">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider4" data-extra-classes="irs-modern" name="example_name"
											type="text">
									</div>
								</div>
							</div>
						</div>
						<!--/div-->

						<!--div-->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Range Slider (Outline Skin)
								</div>
								<p class="mg-b-20">It is the outline skin range slider of Redash.</p>
								<div class="row row-sm">
									<div class="col-lg-12">
										<input class="rangeslider1" data-extra-classes="irs-outline" name="example_name"
											type="text">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider2" data-extra-classes="irs-outline" name="example_name"
											type="text">
									</div>
								</div>
								<div class="row row-sm">
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider3" data-extra-classes="irs-outline" name="example_name"
											type="text">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider4" data-extra-classes="irs-outline" name="example_name"
											type="text">
									</div>
								</div>
							</div>
						</div>
						<!--/div-->

						<!--div-->
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Range Slider
								</div>
								<p class="mg-b-20">Default range slider Of Valex.</p>
								<div class="row row-sm">
									<div class="col-lg-12">
										<input class="rangeslider1" name="example_name" type="text" value="">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider2" name="example_name" type="text" value="">
									</div>
								</div>
								<div class="row row-sm">
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider3" name="example_name" type="text" value="">
									</div>
									<div class="col-lg-12 mg-t-20">
										<input class="rangeslider4" name="example_name" type="text" value="">
									</div>
								</div>
							</div>
						</div>
						<!--/div-->
					</div>
				</div>
				<!-- /Row -->

@endsection('content')

@section('scripts')

		<!--Internal Sparkline js -->
		<script src="{{asset('assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

		<!-- Internal Piety js -->
		<script src="{{asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>

		<!--Internal Ion.rangeSlider.min js -->
		<script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>

		<!-- Internal Chart js -->
		<script src="{{asset('assets/plugins/chartjs/Chart.bundle.min.js')}}"></script>

		<!-- Internal  rangeslider js -->
		<script src="{{asset('assets/js/rangeslider.js')}}"></script>

@endsection

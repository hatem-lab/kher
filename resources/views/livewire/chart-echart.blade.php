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
							<h4 class="content-title mb-0 my-auto">Charts</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ e-charts</span>
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
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Data Attributes
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart5"  class="ht-300"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Data Attributes
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart6"  class="ht-300"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Bar Chart
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart1" class="ht-300"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vertical Bar Chart
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart3"  class="ht-300"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Line Chart
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart2"  class="ht-300"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vertical Line Chart
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart4"  class="ht-300"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Data Attributes
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart7"  class="ht-300"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Data Attributes
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="echart8"  class="ht-300"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- row -->

				<!-- row -->
				<div class="row row-sm">
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Data Attributes
								</div>
								<p class="mg-b-20">It is Very Easy to Customize and it uses in website apllication.</p>
								<div id="index"  class="ht-300"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->

@endsection('content')

@section('scripts')

		<!-- Internal Flot js -->
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
		<script src="{{asset('assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>

		<!--Internal Echart Plugin -->
		<script src="{{asset('assets/plugins/echart/echart.js')}}"></script>
		<script src="{{asset('assets/js/echarts.js')}}"></script>

@endsection

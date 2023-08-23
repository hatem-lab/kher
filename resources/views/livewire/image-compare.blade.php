@extends('layouts.app')

@section('styles')

		<!-- Internal Images-Comparsion css -->
		<link href="{{asset('assets/plugins/images-comparsion/twentytwenty.css')}}" rel="stylesheet" />

@endsection

@section('content')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 ms-2 mb-0">/ Image-comparison</span>
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

				<!-- Row -->
				<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12">
						<div class="card mg-b-20">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Horizontal Image Comparision
								</div>
								<p class="mg-b-20">Example of Redash Horizontal Image Comparision.</p>
								<div class="twentytwenty-container">
									<img src="{{asset('assets/img/photos/compare1.jpg')}}" alt="img" />
									<img src="{{asset('assets/img/photos/compare2.jpg')}}" alt="img" />
								</div>
							</div>
						</div>
						<!-- div -->

						<!-- div -->
						<div class="card">
							<div class="card-body">
								<div class="main-content-label mg-b-5">
									Vertical Image Comparision
								</div>
								<p class="mg-b-20">Example of Redash Vertical Image Comparision.</p>
								<div class="twentytwenty-container" data-orientation="vertical">
									<img src="{{asset('assets/img/photos/compare1.jpg')}}" alt="img" />
									<img src="{{asset('assets/img/photos/compare2.jpg')}}" alt="img" />
								</div>
							</div>
						</div>
						<!-- div -->
					</div>
				</div>
				<!-- /Row -->

@endsection('content')

@section('scripts')

		<!-- Internal Select2 js-->
		<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}"></script>
		
		<!--Internal  Images-Comparsion js -->
		<script src="{{asset('assets/plugins/images-comparsion/jquery.twentytwenty.js')}}"></script>
		<script src="{{asset('assets/plugins/images-comparsion/jquery.event.move.js')}}"></script>
		<script src="{{asset('assets/js/image-comparision.js')}}"></script>

@endsection
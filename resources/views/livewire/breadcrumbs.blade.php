@extends('layouts.app')

@section('styles')

       <!---Internal  Prism css-->
	   <link href="{{asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">

@endsection

@section('content')

				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span
								class="text-muted mt-1 tx-13 ms-2 mb-0">/ Breadcrumbs</span>
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

				<!-- row -->
				<div class="row">
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card" id="basic">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Basic Styling</h6>
									<p class="text-muted card-sub-title">The example below is the basic styling of the breadcrumb from Bootstrap.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb mg-b-0">
												<li class="breadcrumb-item">
													<a href="#">Home</a>
												</li>
												<li class="breadcrumb-item">
													<a href="#">Library</a>
												</li>
												<li class="breadcrumb-item active">Data</li>
											</ol>
										</nav>
									</div>
									<ul class="nav nav-tabs htms-source" id="htms-source-code" role="tablist">
										<li class="nav-item">
											<a class="nav-link active html-code" id="html-code" data-bs-toggle="tab" href="#html-code" role="tab" aria-controls="html-code" aria-selected="true"><i class="fab fa-html5 text-orange pe-2"></i>HTML</a>
										</li>
									</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="breadcrumb1"><pre><code class="language-markup"><script type="htms-dashlead/script"><nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="#">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">Library</a>
		</li>
		<li class="breadcrumb-item active">Data</li>
	</ol>
</nav></script></code></pre>
<div class="clipboard-icon" data-clipboard-target="#breadcrumb1"><i class="las la-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card custom-card" id="custom">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Custom Styling</h6>
									<p class="text-muted card-sub-title">The example below is the custom styling of the breadcrumb used by this template.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb breadcrumb-style1 mg-b-0">
												<li class="breadcrumb-item">
													<a href="#">Home</a>
												</li>
												<li class="breadcrumb-item">
													<a href="#">Library</a>
												</li>
												<li class="breadcrumb-item active">Data</li>
											</ol>
										</nav>
									</div>
									<ul class="nav nav-tabs htms-source" id="htms-source-code2" role="tablist">
										<li class="nav-item">
											<a class="nav-link active html-code" id="html-code2" data-bs-toggle="tab" href="#html-code2" role="tab" aria-controls="html-code2" aria-selected="true"><i class="fab fa-html5 text-orange pe-2"></i>HTML</a>
										</li>
									</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="breadcrumb2"><pre><code class="language-markup"><script type="htms-dashlead/script"><nav aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-style1">
		<li class="breadcrumb-item">
			<a href="#">Home</a>

		</li>
		<li class="breadcrumb-item">
			<a href="#">Library</a>
		</li>
		<li class="breadcrumb-item active">Data</li>
	</ol>
</nav></script></code></pre>
<div class="clipboard-icon" data-clipboard-target="#breadcrumb2"><i class="las la-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
								</div>
							</div>
						</div>
					</div>


					<div class="col-lg-12 col-md-12">
						<div class="card custom-card" id="divider">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Custom Divider</h6>
									<p class="text-muted card-sub-title">The example below is the custom styling of the breadcrumb using different divider.</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<nav aria-label="breadcrumb">
											<ol class="breadcrumb breadcrumb-style2 mb-0">
												<li class="breadcrumb-item">
													<a href="#">Home</a>
												</li>
												<li class="breadcrumb-item">
													<a href="#">Library</a>
												</li>
												<li class="breadcrumb-item active">Data</li>
											</ol>
										</nav>
									</div>
									<ul class="nav nav-tabs htms-source" id="htms-source-code3" role="tablist">
										<li class="nav-item">
											<a class="nav-link active html-code" id="html-code3" data-bs-toggle="tab" href="#html-code3" role="tab" aria-controls="html-code3" aria-selected="true"><i class="fab fa-html5 text-orange pe-2"></i>HTML</a>
										</li>
									</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="breadcrumb3"><pre><code class="language-markup"><script type="htms-dashlead/script"><nav aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-style2">
		<li class="breadcrumb-item">
			<a href="#">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">Library</a>
		</li>
		<li class="breadcrumb-item active">Data</li>
	</ol>
</nav></script></code></pre>
<div class="clipboard-icon" data-clipboard-target="#breadcrumb3"><i class="las la-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-md-12">
						<div class="card custom-card" id="center">
							<div class="card-body">
								<div>
									<h6 class="card-title mb-1">Breadcrumbs-Center align</h6>
									<p class="text-muted card-sub-title">The example below is the center aligment of the breadcrumb</p>
								</div>
								<div class="text-wrap">
									<div class="example">
										<nav class="breadcrumb-3">
											<ol class="breadcrumb breadcrumb-style1 mb-0">
												<li class="breadcrumb-item">
													<a href="#">Data</a>
												</li>
												<li class="breadcrumb-item">
													<a href="#">Library</a>
												</li>
												<li class="breadcrumb-item active">Home</li>
											</ol>
										</nav>
									</div>
									<ul class="nav nav-tabs htms-source" id="htms-source-code4" role="tablist">
										<li class="nav-item">
											<a class="nav-link active html-code" id="html-code4" data-bs-toggle="tab" href="#html-code4" role="tab" aria-controls="html-code4" aria-selected="true"><i class="fab fa-html5 text-orange pe-2"></i>HTML</a>
										</li>
									</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="breadcrumb4"><pre><code class="language-markup"><script type="htms-dashlead/script"><nav class="breadcrumb-3">
	<ol class="breadcrumb breadcrumb-style1">
		<li class="breadcrumb-item">
			<a href="#">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">Library</a>
		</li>
		<li class="breadcrumb-item active">Data</li>
	</ol>
</nav></script></code></pre>
<div class="clipboard-icon" data-clipboard-target="#breadcrumb4"><i class="las la-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="card custom-card" id="right">
								<div class="card-body">
									<div>
										<h6 class="card-title mb-1">Breadcrumbs-Right align</h6>
										<p class="text-muted card-sub-title">The example below is the Right aligment of the breadcrumb</p>
									</div>
									<div class="text-wrap">
										<div class="example">
											<nav class="breadcrumb-4">
												<ol class="breadcrumb breadcrumb-style1 mb-0">
													<li class="breadcrumb-item">
														<a href="#">Home</a>
													</li>
													<li class="breadcrumb-item">
														<a href="#">Library</a>
													</li>
													<li class="breadcrumb-item active">Data</li>
												</ol>
											</nav>
										</div>
										<ul class="nav nav-tabs htms-source" id="htms-source-code5" role="tablist">
											<li class="nav-item">
												<a class="nav-link active html-code" id="html-code5" data-bs-toggle="tab" href="#html-code5" role="tab" aria-controls="html-code5" aria-selected="true"><i class="fab fa-html5 text-orange pe-2"></i>HTML</a>
											</li>
										</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget" id="breadcrumb5"><pre><code class="language-markup"><script type="htms-dashlead/script"><nav class="breadcrumb-4">
	<ol class="breadcrumb breadcrumb-style1">
		<li class="breadcrumb-item">
			<a href="#">Home</a>
		</li>
		<li class="breadcrumb-item">
			<a href="#">Library</a>
		</li>
		<li class="breadcrumb-item active">Data</li>
	</ol>
</nav></script></code></pre>
<div class="clipboard-icon" data-clipboard-target="#breadcrumb5"><i class="las la-clipboard"></i></div>
</figure>
<!-- End Prism Precode -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection('content')

@section('scripts')


	   <!--Internal  Clipboard js-->
	   <script src="{{asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
	   <script src="{{asset('assets/plugins/clipboard/clipboard.js')}}"></script>

	   <!-- Internal Prism js-->
	   <script src="{{asset('assets/plugins/prism/prism.js')}}"></script>

@endsection
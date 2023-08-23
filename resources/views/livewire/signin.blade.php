@extends('layouts.custom-app')

@section('styles')

@endsection

@section('class')

		<div class="error-page1 bg-light text-dark">

@endsection

@section('content')

			<!-- container -->
			<div class="container-fluid">

				<div class="row no-gutter">
					<!-- The image half -->
					<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
						<div class="row wd-100p mr-center text-center">
							<div class="col-md-12 col-lg-12 col-xl-12 my-auto mr-center wd-100p">
								<img src="{{asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mr-center" alt="logo">
							</div>
						</div>
					</div>
					<!-- The content half -->
					<div class="col-md-6 col-lg-6 col-xl-5 bg-white">
						<div class="login d-flex align-items-center py-2">
							<!-- Demo content-->
							<div class="container p-0">
								<div class="row">
									<div class="col-md-10 col-lg-10 col-xl-9 mr-center">
										<div class="card-sigin">
											<div class="card-sigin">
												<div class="card-sigin d-flex mb-5">
													<a href="{{url('index')}}"><img src="{{asset('assets/img/brand/favicon.png')}}" class="sign-favicon-a ht-40" alt="logo">
														<img src="{{asset('assets/img/brand/favicon-white.png')}}" class="sign-favicon-b ht-40" alt="logo">
														</a>
														<h1 class="main-logo1 ms-1 me-0 my-auto tx-28 ps-1">Va<span>le</span>x</h1>
												</div>
												<div class="card-sigin">
												<div class="main-signup-header">
													<h2>Welcome back!</h2>
													<h5 class="fw-semibold mb-4">Please sign in to continue.</h5>
													<form action="#">
														<div class="form-group">
															<label>Email</label> <input class="form-control" placeholder="Enter your email" type="text">
														</div>
														<div class="form-group">
															<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password">
														</div><a class="btn btn-main-primary btn-block" href="{{url('index')}}">Sign In</a>
														<div class="row row-xs">
															<div class="col-sm-6">
																<a href="{{url('index')}}"class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</a>
															</div>
															<div class="col-sm-6 mg-t-10 mg-sm-t-0">
																<a href="{{url('index')}}"class="btn btn-info btn-block btn-b"><i class="fab fa-twitter"></i> Signup with Twitter</a>
															</div>
														</div>
													</form>
													<div class="main-signin-footer mt-5">
														<p><a href="{{url('forgot')}}">Forgot password?</a></p>
														<p>Don't have an account? <a href="{{url('signup')}}">Create an Account</a></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div><!-- End -->
						</div>
					</div><!-- End -->
				</div>
				</div>

			</div>
			<!-- container -->

@endsection('content')

@section('scripts')

@endsection
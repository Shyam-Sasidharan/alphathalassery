<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>	ALPHA | Center for Theology and Science</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/png" href="{{ asset('front')}}/images/logo.png">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('front')}}/css/lightbox.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/aos@2.3.0/dist/aos.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('front')}}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('front')}}/css/responsive.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" />
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    @yield('css')
</head>
<body>
	<header class="header">
		<div class="top-header">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 hidden-xs">
						<ul class="social-icons">
							<li>
								<a href="https://www.facebook.com/alphatly" target="_blank"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="https://twitter.com/AlphaInstitute2" target="_blank"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="https://www.youtube.com/channel/UCFJs8RNJPe7dVAAIsTYGMsA" target="_blank"><i class="fa fa-youtube"></i></a>
							</li>
							<!-- <li>
								<a href="javascript:;" target="_blank"><i class="fa fa-linkedin"></i></a>
							</li> -->
							<li>
								<a href="https://wa.me/+918086312826" target="_blank"><i class="fa fa-whatsapp" style="background-color:#25D366" ></i></a>
							</li>
						</ul>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-12">
						<div class="header-top-right">
							<div class="content">
								<a href="http://www.icampuz.in/aits/">Student Login</a>
							</div>					
							<div class="content">
								<a href="javascript:;">Alpha</a>
								<ul class="top-submenu">
									<li>
										<a href="{{url('about')}}">About Alpha</a>
									</li>
									<li>
										<a href="{{url('study-centres')}}">Study Centers</a>
									</li>
									<li>
										<a href="{{url('publications')}}">Publications</a>
									</li>
									<li>
										<a href="{{url('library')}}">Library</a>
									</li>
									<li>
										<a href="{{url('contact')}}">Contact Us</a>
									</li>
								</ul>
							</div>		
							<div class="content">
								<a href="{{url('bible-apostolate')}}">Bible Apostolate</a>
							</div>					
							<div class="content">
								<a href="javascript:;" data-target="#registerModal" data-toggle="modal">Online Registration</a>
							</div>
							<div class="content">
								<a href="{{url('faq')}}">FAQ</a>
							</div>
							<div class="content">
								<a href="{{ url('downloads') }}">Downloads</a>
							</div>
							<div class="content">
								<a href="{{ url('hand-book') }}">Hand Book</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sticky-logo">
			<div class="fixed-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-6">
							<div class="site-branding">
								<div class="wrap">
									<a href="{{ url('/') }}">
										<img src="{{ asset('front')}}/images/logo.png?v=1" class="img-fluid">
									</a>
									<div class="header-title">
										<h1>ALPHA</h1>
										<h6>Center for Theology and Science</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8 col-sm-6 col-6">
							<div class="header-phone">
								<h2><i class="fa fa-phone"></i> +918086312826 </h2>
							</div>
							<div class="header-menu">
								<div class="header-menu-area">
									<div class="inner-menu-area justify-content-between d-flex align-center-items float-right">
										<nav class="main-navigation">
											<div class="main-menu-container">
												<ul class="menu">
													<li class="menu-item {{request()->is('/')?'current-menu-item':''}}">
														<a href="{{url('')}}">Home</a>
													</li>
													<li class="menu-item {{request()->is('about')?'current-menu-item':''}}">
														<a href="{{url('about')}}">About Alpha</a>
													</li>
													<li class="menu-item {{request()->is('course/*')?'current-menu-item':''}}">
														<a href="javascript:;">Courses</a>
														<ul class="subMenu">
															@if (($courses = \App\Models\Course::orderBy('created_at')->get()) && !$courses->isEmpty())
																@foreach($courses as $course)
																	<li>
																		<a href="{{ url('course/'.$course->slug) }}">{{$course->name}}</a>
																	</li>
																@endforeach
															@endif
														</ul>
													</li>
													<li class="menu-item">
														<a href="{{url('study-centres')}}">Study Centers</a>
													</li>
													<li class="menu-item {{request()->is('publications')?'current-menu-item':''}}">
														<a href="{{url('publications')}}">Publications</a>
													</li>
													<li class="menu-item">
														<a href="{{url('library')}}">Library</a>
													</li>
													<li class="menu-item {{request()->is('contact')?'current-menu-item':''}}"">
														<a href="{{url('contact')}}">Contact Us</a>
													</li>
												</ul>
											</div>
											<!-- <ul class="header-search">
												<li>
													<i class="fa fa-search" id="toggle-search"></i>
												</li>
											</ul>
											<div class="search-bar">
												<div class="search-form">
													<form>
														<input type="search" name="search" class="form-control" placeholder="Search here...">
														<button type="submit">
															<span><i class="fa fa-search"></i></span>
														</button>
													</form>
												</div>
											</div> -->
										</nav>
									</div>
								</div>
							</div>
							<div id="menu-toggle" class="nav-menu-toggle">
								<i class="fa fa-bars"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mob-header">
			<span class="closepanel">
				<i class="fa fa-close"></i>
			</span>
			<ul class="mob-menu">
				<li class="menu-item">
					<a href="{{url('')}}">Home</a>
				</li>
				<li class="menu-item">
					<a href="{{url('about')}}">About Alpha</a>
				</li>
				<li class="menu-item">
					<a href="javascript:;">Courses</a>
					<span class="sub-menu-toggle"><i class="fa fa-chevron-down"></i></span>
					<ul class="sub-menu">
						@if (($courses = \App\Models\Course::orderBy('created_at')->get()) && !$courses->isEmpty())
							@foreach($courses as $course)
								<li>
									<a href="{{ url('course/'.$course->slug) }}">{{$course->name}}</a>
								</li>
							@endforeach
						@endif
					</ul>
				</li>
				<li class="menu-item">
					<a href="{{url('study-centres')}}">Study Centers</a>
				</li>
				<li class="menu-item">
					<a href="{{url('publications')}}">Publications</a>
				</li>
				<li class="menu-item">
					<a href="{{url('library')}}">Library</a>
				</li>
				<li class="menu-item">
					<a href="{{url('contact')}}">Contact Us</a>
				</li>
			</ul>
		</div>
	</header>
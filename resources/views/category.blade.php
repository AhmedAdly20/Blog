<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>WebMag HTML Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:700%7CNunito:300,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>

		<!-- Header -->
		<header id="header">
			<!-- Nav -->
			<div id="nav">
				<!-- Main Nav -->
				<div id="nav-fixed">
					<div class="container">
						<!-- logo -->
						<div class="nav-logo">
							<a href="{{ route('index') }}" class="logo"><img src="{{ asset('./img/logo.png') }}" alt=""></a>
						</div>
						<!-- /logo -->

						<!-- nav -->
						<ul class="nav-menu nav navbar-nav">
							<li><a href="category.html">News</a></li>
                            <li><a href="category.html">Popular</a></li>
                            @foreach ($categories as $category)
                                <li class="{{ $category->class }}"><a href="{{ route('singleCategory',['id'=>$category->id]) }}">{{ $category->name }}</a></li>
                            @endforeach
						</ul>
						<!-- /nav -->

						<!-- search & aside toggle -->
						<div class="nav-btns">
							<button class="aside-btn"><i class="fa fa-bars"></i></button>
							<button class="search-btn"><i class="fa fa-search"></i></button>
							<div class="search-form">
								<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
								<button class="search-close"><i class="fa fa-times"></i></button>
							</div>
						</div>
						<!-- /search & aside toggle -->
					</div>
				</div>
				<!-- /Main Nav -->

				<!-- Aside Nav -->
				<div id="nav-aside">
					<!-- nav -->
					<div class="section-row">
						<ul class="nav-aside-menu">
							<li><a href="{{ route('index') }}">Home</a></li>
							<li><a href="about.html">About Us</a></li>
							<li><a href="#">Join Us</a></li>
							<li><a href="#">Advertisement</a></li>
							<li><a href="{{ route('contact') }}">Contacts</a></li>
						</ul>
					</div>
					<!-- /nav -->

					<!-- widget posts -->
					<div class="section-row">
						<h3>Recent Posts</h3>
						@foreach ($recentPosts as $Post)
                        <div class="post post-widget">
							<a class="post-img" href="{{ route('singlePost',['id'=>$Post->id]) }}"><img src="{{ asset('storage/'.$Post->image) }} " alt=""></a>
							<div class="post-body">
								<h3 class="post-title"><a href="{{ route('singlePost',['id'=>$Post->id]) }}">{{ $Post->title }}</a></h3>
							</div>
						</div>
                        @endforeach
					</div>
					<!-- /widget posts -->

					<!-- social links -->
					<div class="section-row">
						<h3>Follow us</h3>
						<ul class="nav-aside-social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
						</ul>
					</div>
					<!-- /social links -->

					<!-- aside nav close -->
					<button class="nav-aside-close"><i class="fa fa-times"></i></button>
					<!-- /aside nav close -->
				</div>
				<!-- Aside Nav -->
			</div>
			<!-- /Nav -->

			<!-- Page Header -->
			<div class="page-header">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<ul class="page-header-breadcrumb">
								<li><a href="{{ route('index') }}">Home</a></li>
								<li>{{ $Category->name }}</li>
							</ul>
							<h1>{{ $Category->name }}</h1>
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Header -->
		</header>
		<!-- /Header -->

		<!-- section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-8">
						<div class="row">
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-thumb">
									<a class="post-img" href="{{ route('singlePost',['id'=>$PostNumber1->id]) }}"><img src="{{ asset('storage/'.$PostNumber1->image) }} " alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category {{ $Category->class }}" href="#"> {{ $Category->name }} </a>
											<span class="post-date">{{ $PostNumber1->created_at->diffForHumans() }}</span>
										</div>
										<h3 class="post-title"><a href="{{ route('singlePost',['id'=>$PostNumber1->id]) }}">{{ $PostNumber1->title }}</a></h3>
									</div>
								</div>
							</div>
							<!-- /post -->
                            @foreach ($secondPosts as $post)
							<!-- post -->
							<div class="col-md-6">
								<div class="post">
									<a class="post-img" href="{{ route('singlePost',['id'=>$post->id]) }}"><img src="{{ asset('storage/'.$post->image) }} " alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category {{ $post->category->class }}" href="#">{{ $post->category->name }}</a>
											<span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
										</div>
										<h3 class="post-title"><a href="{{ route('singlePost',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
									</div>
								</div>
							</div>
                            <!-- /post -->
                            @endforeach

							<div class="clearfix visible-md visible-lg"></div>

							<!-- ad -->
							<div class="col-md-12">
								<div class="section-row">
									<a href="#">
										<img class="img-responsive center-block" src="https://a.top4top.io/p_14856tue41.jpg" alt="">
									</a>
								</div>
							</div>
							<!-- ad -->
                            @foreach ($Posts as $post)
							<!-- post -->
							<div class="col-md-12">
								<div class="post post-row">
									<a class="post-img" href="{{ route('singlePost',['id'=>$post->id]) }}"><img src="{{ asset('storage/'.$post->image) }} " alt=""></a>
									<div class="post-body">
										<div class="post-meta">
											<a class="post-category {{ $post->category->class }}" href="#">{{ $post->category->name }}</a>
											<span class="post-date">{{ $post->created_at->diffForHumans() }}</span>
										</div>
										<h3 class="post-title"><a href="{{ route('singlePost',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
										<p>{{ $post->description }}...</p>
									</div>
								</div>
							</div>
                            <!-- /post -->
                            @endforeach

							<div class="col-md-12">
								<div class="section-row">
									<button class="primary-button center-block">Load More</button>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<!-- ad -->
						<div class="aside-widget text-center">
							<a href="#" style="display: inline-block;margin: auto;">
								<img class="img-responsive" src="https://h.top4top.io/p_1483y9jup1.jpg" alt="">
							</a>
						</div>
						<!-- /ad -->

						<!-- post widget -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Most Read</h2>
							</div>
                            @foreach ($mostReadPosts as $post)
							<div class="post post-widget">
								<a class="post-img" href="{{ route('singlePost',['id'=>$post->id]) }}"><img src="{{ asset('storage/'.$post->image) }}" alt=""></a>
								<div class="post-body">
									<h3 class="post-title"><a href="{{ route('singlePost',['id'=>$post->id]) }}">{{ $post->title }}</a></h3>
								</div>
                            </div>
                            @endforeach
						</div>
						<!-- /post widget -->

						<!-- catagories -->
						<div class="aside-widget">
							<div class="section-title">
								<h2>Catagories</h2>
							</div>
							<div class="category-widget">
								<ul>
									@foreach ($categories as $category)
					                    <li><a href="{{ route('singleCategory',['id'=>$category->id]) }}" class=" {{ $category->class }} ">{{ $category->name }}<span>{{ $category->posts->count() }}</span></a></li>
                                    @endforeach
								</ul>
							</div>
						</div>
						<!-- /catagories -->

						<!-- tags -->
						<div class="aside-widget">
							<div class="tags-widget">
								<ul>
									@foreach ($tags as $tag)
									    <li><a href="{{ route('singleTag',['id'=>$tag->id]) }}">{{ $tag->name }}</a></li>
                                    @endforeach
								</ul>
							</div>
						</div>
						<!-- /tags -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /section -->

		<!-- Footer -->
		<footer id="footer">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-5">
						<div class="footer-widget">
							<div class="footer-logo">
								<a href="{{ route('index') }}" class="logo"><img src="{{ asset('./img/logo.png') }}" alt=""></a>
							</div>
							<ul class="footer-nav">
								<li><a href="#">Privacy Policy</a></li>
								<li><a href="#">Advertisement</a></li>
							</ul>
							<div class="footer-copyright">
								<span>&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="row">
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">About Us</h3>
									<ul class="footer-links">
										<li><a href="about.html">About Us</a></li>
										<li><a href="#">Join Us</a></li>
										<li><a href="{{ route('contact') }}">Contacts</a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="footer-widget">
									<h3 class="footer-title">Categories</h3>
									<ul class="footer-links">
                                        @foreach ($categories as $category)
                                            <li><a href="{{ route('singleCategory',['id'=>$category->id]) }}">{{ $category->name }}</a></li>
                                        @endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="footer-widget">
							<h3 class="footer-title">Join our Newsletter</h3>
							<div class="footer-newsletter">
								<form>
									<input class="input" type="email" name="newsletter" placeholder="Enter your email">
									<button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
								</form>
							</div>
							<ul class="footer-social">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</footer>
		<!-- /Footer -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

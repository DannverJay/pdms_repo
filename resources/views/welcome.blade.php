<!DOCTYPE html>
<html lang="zxx" class="js">
	<head>
		<base href="../" />
		<meta charset="utf-8" />
		<meta name="author" content="Softnio" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers." />
		<!-- Fav Icon  -->
		<link rel="shortcut icon" href="{{ asset('landing/asset/images/logo.png') }}" />
		<!-- Page Title  -->
		<title>Home | PDMS </title>
		<!-- StyleSheets  -->
		<link rel="stylesheet" href="{{ asset('landing/assets/css/dashlite.css') }}" />
		<link id="skin-default" rel="stylesheet" href="{{ asset('assets/auth/css/skins/theme-bluelite.css') }}" />
	</head>

	<body class="nk-body bg-white npc-landing">
		<div class="nk-app-root">
			<!-- main @s -->
			<div class="nk-main">
				<header class="header has-header-main-s1 bg-dark" id="home">
					<div class="header-main header-main-s1 is-sticky is-transparent on-dark">
						<div class="container header-container">
							<div class="header-wrap">
								<div class="header-logo">
									<a href="#" class="logo-link">
										<img class="logo-light logo-img" src="{{ asset('landing/assets/images/logo-dark.png') }}" alt="logo" />
									</a>
								</div>
								<div class="header-toggle">
									<button class="menu-toggler" data-target="mainNav">
										<em class="menu-on icon ni ni-menu"></em>
										<em class="menu-off icon ni ni-cross"></em>
									</button>
								</div>
								<!-- .header-nav-toggle -->
								<nav class="header-menu" data-content="mainNav">
									<ul class="menu-list ms-lg-auto">
										<li class="menu-item active"><a href="#home" class="menu-link nav-link">Home</a></li>

									</ul>
									<ul class="menu-btns">
                                        @auth
                                            <li>
                                                <a href="{{ url('/dashboard') }}" class="btn btn-primary btn-lg">Dashboard</a>
                                            </li>

                                        @endauth
                                    </ul>
								</nav>
								<!-- .nk-nav-menu -->
							</div>
							<!-- .header-warp-->
						</div>
						<!-- .container-->
					</div>
					<!-- .header-main-->
					<div class="header-content my-auto py-6 is-dark">
						<div class="container mt-n4 mt-lg-0">
							<div class="row flex-lg-row-reverse align-items-center justify-content-between g-gs">
								<div class="col-lg-6 mb-lg-0">
									<div class="header-play text-lg-center">
                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/W7ADHpaHIuQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
										{{-- <a class="play popup-video" href="https://www.youtube.com/embed/W7ADHpaHIuQ"> --}}
											{{-- <div class="styled-icon styled-icon-6x styled-icon-s5 text-warning">
												<svg x="0px" y="0px" viewBox="0 0 512 512" style="fill: currentColor" xml:space="preserve">
													<path
														d="M436.2,178.3c-7.5-4.7-17.4-2.4-22.1,5.1c-4.7,7.5-2.4,17.4,5.1,22.1c17.5,10.9,28,29.8,28,50.4s-10.5,39.5-28,50.4
	L155.7,470.7c-18.6,11.6-41.1,12.2-60.3,1.5c-19.2-10.6-30.6-30.1-30.6-52V91.7c0-21.9,11.4-41.3,30.6-52
	c19.1-10.6,41.7-10.1,60.3,1.5l153.4,95.6c7.5,4.7,17.4,2.4,22.1-5.1c4.7-7.5,2.4-17.4-5.1-22.1L172.7,14
	c-28.6-17.9-63.3-18.7-92.9-2.4C50.3,28.1,32.7,58,32.7,91.7v328.6c0,33.7,17.6,63.7,47.1,80c14.1,7.8,29.3,11.7,44.5,11.7
	c16.7,0,33.4-4.7,48.4-14l263.5-164.3c27-16.8,43.1-45.9,43.1-77.7S463.2,195.2,436.2,178.3z"
													/>
												</svg>
											</div>
											<div class="play-text">Demo Video Tutorial</div> --}}
										</a>
									</div>
								</div>
								<!-- .col- -->
								<div class="col-lg-6 col-md-10">
									<div class="header-caption">
										<h1 class="header-title fw-medium">Apalit Personnel Document Management System</h1>
										<div class="header-text">
											<p>This website is exclusive for Apalit Municipal Police Station only.</p>
										</div>
										<ul class="header-action btns-inline">
											<li>
												<a href="{{ route('login') }}" class="btn btn-primary btn-lg btn-round"><span>Log In</span></a>
											</li>
										</ul>
									</div>
									<!-- .header-caption -->
								</div>
								<!-- .col -->
							</div>
							<!-- .row -->
						</div>
						<!-- .container -->
					</div>
					<!-- .header-content -->
					<div class="bg-image bg-overlay after-bg-dark after-opacity-95">
						<img src="{{ asset('landing/assets/images/bg/a.jpg') }}" alt="" />
					</div>
				</header>
				<!-- .header -->
			</div>
			<!-- main @e -->
		</div>
		<!-- app-root @e -->
		<!-- JavaScript -->
		<script src="{{ asset('landing/assets/js/bundle.js') }}"></script>
		<script src="{{ asset('landing/assets/js/scripts.js') }}"></script>
	</body>
</html>

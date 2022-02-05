<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<title>Welcome(Resumes App)</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
        <link href="{{ asset('/css/welcome.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	</head>
	<body class="loading">

		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">
                <!-- Header -->
                <header id="header" class="bg-primary text-secondary rounded-pill p-3">


						<h1>Resumes APP</h1>
						<p>Interviews &nbsp;&bull;&nbsp; Contracts &nbsp;&bull;&nbsp; Work</p>
						<nav>
                            @if (Route::has('login'))
                                <div class="m-2 text-light">
                                    @auth
                                        <a href="{{ url('/home') }}" class="btn btn-dark rounded-pill m-1 text-light">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-dark rounded-pill m-1 text-light">Login</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="btn btn-dark rounded-pill m-1 text-light">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
						    <ul>
								<li><a href="https://github.com/VicentUCF" class="fab fa-github text-secondary"><span class="label">Github</span></a></li>
								<li><a href="https://www.linkedin.com/in/vicent-ciscar-929a2a20a/" class="fab fa-linkedin text-secondary"><span class="label">Linkedin</span></a></li>
								<li><a href="https://twitter.com/Vicent_UCF" class="fab fa-twitter text-secondary"><span class="label">Twitter</span></a></li>
							</ul>
						</nav>
					</header>
			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
	</body>
</html>

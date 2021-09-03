<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap4 Dashboard Template">
		<meta name="author" content="ParkerThemes">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Session Habis - 419</title>
		

		<!-- Font for coming soon page -->
		<link href="https://fonts.googleapis.com/css?family=Bebas+Neue|Girassol|ZCOOL+KuaiLe&display=swap" rel="stylesheet">

		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap css -->
        
		<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="{{ asset('assets/fonts/style.css') }}">
		
		<!-- Main css -->
		<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

		<!-- *************
			************ Vendor Css Files *************
		************ -->
		<!-- Particles CSS -->		
		<link rel="stylesheet" href="{{ asset('assets/vendor/particles/particles.css') }}">

	</head>

	<body class="authentication">

		<div id="particles-js"></div>
		<div class="countdown-bg"></div>

		<div class="error-screen">
			<h1>419</h1>
			<h5>Opppsss....<br/>Session anda sudah habis silakan login kembali.</h5>
			<button onclick="goBack()" class="btn btn-secondary">Go Back</button>
		</div>

		<!--**************************
			**************************
				**************************
							Required JavaScript Files
				**************************
			**************************
		**************************-->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
        
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>
		<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
		<script src="{{asset('assets/js/moment.js')}}"></script>

		<!-- *************
			************ Vendor Js Files *************
		************* -->
		<!-- Particles JS -->		
		<script src="{{asset('assets/vendor/particles/particles.min.js')}}"></script>
		<script src="{{asset('assets/vendor/particles/particles-custom-error.js')}}"></script>
		<script>
			function goBack() {
				window.history.back();
			}
		</script>
	</body>
</html>
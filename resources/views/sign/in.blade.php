<!DOCTYPE html>
<html>
<head>
	<title>Rental Mobil - Login</title>
	<meta charset="utf-8">
	<meta name=description content="">
	<meta name=viewport content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/css/font-awesome.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/assets.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/body.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/story.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/sign.css') }}">

	<!-- JS -->
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript">
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
        function login() {
        	var username = $('#username').val();
        	var password = $('#password').val();
        	if (username === password) {
        		window.location = '{{ url("dashboard") }}';
        	} else {
        		alert('Username or Password is wrong.');
        	}
        }
        function alert(message) {
        	$('#alert').show().find('#message').html(message);
        }
        $(document).ready(function() {
        	$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
        	$('#form-sign').submit(function(event) {
        		var username = $('#username').val();
	        	var password = $('#password').val();
	        	
	        	$.ajax({
	        		url: '{{ url("/admin/login") }}',
	        		type: 'post',
	        		data: {'username': username, 'password': password},
	        	})
	        	.done(function(data) {
	        		if (data === "success") {
	        			window.location = '{{ url("/dashboard") }}';
	        		} else {
	        			alert('Username atau Password salah, mohon ulangi kembali.');
	        		}
	        	})
	        	.fail(function(e) {
	        		console.log(e);
	        	});
	        	
        	});
        });
	</script>
</head>
<body>
	<div class="frame-sign">
		<div class="top">
			<h2>Mohon Masukan Data Login Anda.</h2>
		</div>
		<div class="mid">
			<div id="alert">
				<span id="message">Message</span>
			</div>
			<form method="post" action="javascript:void(0)" id="form-sign">
				<div class="sig-block">
					<p>Username</p>
					<input type="username" name="username" class="txt txt-main-color" required="required" id="username">
				</div>
				<div class="sig-block">
					<p>Password</p>
					<input type="password" name="password" class="txt txt-main-color" required="required" id="password">
				</div>
				<div class="padding-bottom"></div>
				<div class="sig-block">
					<input type="submit" name="login" class="btn btn-main-color" value="Login">
				</div>
			</form>
		</div>
		<div class="bot">
			<div class="all">
				<strong>RENTAL MOBIL</strong> @ 2018 all right reserved
			</div>
		</div>
	</div>
</body>
</html>

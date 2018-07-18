<!DOCTYPE html>
<html>
<head>
	<title>Rental Mobil - @yield("title")</title>
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
	<link rel="stylesheet" type="text/css" href="{{ asset('css/pikaday.css') }}">

	<!-- JS -->
	<script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/pikaday.js') }}"></script>
	<script type="text/javascript">
		window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};

		function opSearch(stt) {
			if (stt === 'open') {
				$('#search').fadeIn();
				$('#txt-search').select();
			} else {
				$('#search').fadeOut();
			}
		}

		function logOut() {
			var a = confirm('Logout ?')
			if (a === true) {
				window.location = '{{ url("/admin/logout") }}';
			}
		}

		function addBook(id) {
			window.location = '{{ url("/add/booking/") }}'+'/'+id;
		}

		function editMobil(id)
		{
			window.location = "{{ url('/data/car/edit/') }}"+'/'+id;
		}
		function toLink(link) {
			window.location = "{{ url('/') }}"+link;
		}

		function deleteTransaksi(id)
		{
			var que = confirm("Yakin ingin menghapus Transaksi ini ?");
			if (que === true) {
				$.ajax({
					url: '{{ url("/add/transaction/delete") }}',
					type: 'post',
					data: {'id_sewa': id},
				})
				.done(function(data) {
					if (data === "failed") {
						alert("Gagal menghapus Transaksi ini.");
					} else {
						alert("Transaksi berhasil dihapus.");
						window.location = '{{ url("/data/transaction") }}';
					}
				})
				.fail(function(data) {
					alert("terjadi error, mohon ulangi lagi nanti.");
					console.log(data.responseJSON);
				});
			}
		}

		function deletePenyewa(id, path = '')
		{
			var que = confirm("Yakin ingin menghapus Member ini ?");
			if (que === true) {
				$.ajax({
					url: '{{ url("/add/user/delete") }}',
					type: 'post',
					data: {'id_penyewa': id},
				})
				.done(function(data) {
					if (data === "failed") {
						alert("Gagal menghapus Member ini.");
					} else {
						alert("Member berhasil dihapus.");
						if (path === '') {
							window.location = '{{ url("/") }}';
						} else {
							window.location = '{{ url("/") }}'+'/'+path;
						}
					}
				})
				.fail(function(data) {
					//alert("terjadi error, mohon ulangi lagi nanti.");
					console.log(data.responseJSON);
				});
			}
		}

		function deleteMobil(id, path = '')
		{
			var que = confirm("Yakin ingin menghapus mobil ini ?");
			if (que === true) {
				$.ajax({
					url: '{{ url("/add/car/delete") }}',
					type: 'post',
					data: {'id': id},
				})
				.done(function(data) {
					if (data === "failed") {
						alert("Gagal menghapus mobil.");
					} else {
						alert("Mobil berhasil dihapus.");
						if (path === '') {
							window.location = '{{ url("/") }}';
						} else {
							window.location = '{{ url("/") }}'+'/'+path;
						}
					}
				})
				.fail(function(data) {
					//alert("terjadi error, mohon ulangi lagi nanti.");
					console.log(data.responseJSON);
				});
			}
		}

		$(document).ready(function() {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$('#side-menu li').each(function(index, el) {
				$(this).removeClass('active');
				$('#{{ $path }}').addClass('active');
			});
		});
	</script>
</head>
<body>
	<div id="header">
		<div class="place">
			<div class="menu">
				<div class="pos lef">
					<a href="{{ url('/dashboard') }}">
						<!--
						<span class="logo">
							<img src="{{ asset('/img/lg.png') }}" alt="">
						</span>
						-->
						<span class="usr">
							<h2>LOGIN AS ADMIN</h2>
						</span>
					</a>
				</div>
				<div class="pos mid">
					<h2>RENTAL MOBIL</h2>
					<strong>Bandung</strong>
				</div>
				<div class="pos rig">
					<button class="btn btn-main-color" onclick="logOut()">
						<span class="fa fa-lg fa-power-off"></span>
						<span>Logout</span>
					</button>
				</div>
			</div>
		</div>
	</div>
	<div id="body" class="col-full">
		<div id="side">
			<ul id="side-menu">
				<div class="here">
					<strong>Main</strong>
					<a href="{{ url('/dashboard') }}">
						<li id="home">
							<span class="icn fa fa-lg fa-home"></span>
							<span class="ttl">Halaman Utama</span>
						</li>
					</a>
				</div>
				<div class="here">
					<strong>Add</strong>
					<a href="{{ url('/add/car') }}">
						<li id="add">
							<span class="icn fa fa-lg fa-plus"></span>
							<span class="ttl">Tambah Mobil</span>
						</li>
					</a>
				</div>
				<div class="here">
					<strong>Data</strong>
					<a href="{{ url('/data/car') }}">
						<li id="car">
							<span class="icn fa fa-lg fa-car"></span>
							<span class="ttl">Daftar Mobil</spamn>
						</li>
					</a>
					<a href="{{ url('/data/booking') }}">
						<li id="booking">
							<span class="icn fa fa-lg fa-users"></span>
							<span class="ttl">Daftar Penyewa</spamn>
						</li>
					</a>
					<a href="{{ url('/data/transaction') }}">
						<li id="transaction">
							<span class="icn fa fa-lg fa-line-chart"></span>
							<span class="ttl">Daftar Transaksi</spamn>
						</li>
					</a>
				</div>
				<div class="here">
					<strong>Tools</strong>
					<li onclick="logOut()">
						<span class="icn fa fa-lg fa-power-off"></span>
						<span class="ttl">Logout</span>
					</li>
				</div>
			</ul>
		</div>
		<div id="main">
			@yield("content")
		</div>
	</div>
</body>
</html>

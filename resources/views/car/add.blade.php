@extends('layout.index')
@section('title', $title)
@section('content')
<script type="text/javascript">
	function loadCover() {
		var OFReader = new FileReader();
		OFReader.readAsDataURL(document.getElementById("foto").files[0]);
		OFReader.onload = function (oFREvent) {
			$("#place-foto").css('background-image', 'url('+oFREvent.target.result+')');
		}
	}
	function publish() {
		var fd = new FormData();
		var cover = $('#foto')[0].files[0];
		var nama = $('#nama-mobil').val();
		var jenis = $('#jenis-mobil').val();
		var merk = $('#merk-mobil').val();
		var warna = $('#warna-mobil').val();
		var nomor_polisi = $('#nomor-polisi').val();
		var nomor_rangka = $('#nomor-rangka').val();
		var nomor_mesin = $('#nomor-mesin').val();
		var slinder = $('#isi-slinder').val();
		var harga = $('#harga-sewa').val();
		var tahun = $('#tahun-mobil').val();

		fd.append('cover', cover);
		fd.append('nama', nama);
		fd.append('jenis', jenis);
		fd.append('merk', merk);
		fd.append('warna', warna);
		fd.append('nomor_polisi', nomor_polisi);
		fd.append('nomor_rangka', nomor_rangka);
		fd.append('nomor_mesin', nomor_mesin);
		fd.append('slinder', slinder);
		fd.append('harga', harga);
		fd.append('tahun', tahun);
		$.each($('#form-publish').serializeArray(), function(a, b) {
		   	fd.append(b.name, b.value);
		});

		$.ajax({
		  	url: '{{ url("/add/car/publish") }}',
			data: fd,
			processData: false,
			contentType: false,
			type: 'post',
			beforeSend: function() {
				$('#btn-submit').val('Sedang Menambahkan');
			}
		})
		.done(function(data) {
		   	if (data === 'failed') {
		   		alert('Gagal menambahkan mobil.');
		   		$('#btn-submit').val('Tambahkan Data');
		   	} else {
				window.location = '{{ url("/") }}';
		   	}
		})
		.fail(function(data) {
		  	alert('error terjadi, mohon ulangi lagi nanti.');
		  	//console.log(data.responseJSON);
		  	$('#btn-submit').val('Tambahkan Data');
		});

		return false;
	}
</script>
<form id="form-publish" method="post" action="javascript:void(0)" enctype="multipart/form-data" onsubmit="publish()">
<div class="frame-home">
	<div class="reservasi">
		<div class="main">
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Publik Mobil</H2>
				</div>
				<div class="here">
					<p>Nama Mobil</p>
					<input type="text" name="nama" placeholder="" class="txt txt-main-color" id="nama-mobil" required="true">
				</div>
				<div class="here">
					<p>Jenis Mobil</p>
					<input type="text" name="jenis" placeholder="" class="txt txt-main-color" id="jenis-mobil" required="true">
				</div>
				<div class="here">
					<p>Merk Mobil</p>
					<input type="text" name="merk" placeholder="" class="txt txt-main-color" id="merk-mobil" required="true">
				</div>
				<div class="here">
					<p>Warna</p>
					<input type="text" name="warna" placeholder="" class="txt txt-main-color" id="warna-mobil" required="true">
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Inti Mobil</H2>
				</div>
				<div class="here">
					<p>Nomor Polisi</p>
					<input type="text" name="no-polisi" placeholder="" class="txt txt-main-color" id="nomor-polisi" required="true">
				</div>
				<div class="here">
					<p>Nomor Rangka</p>
					<input type="text" name="no-rangka" placeholder="" class="txt txt-main-color" id="nomor-rangka" required="true">
				</div>
				<div class="here">
					<p>Nomor Mesin</p>
					<input type="text" name="no-mesin" placeholder="" class="txt txt-main-color" id="nomor-mesin" required="true">
				</div>
				<div class="here">
					<p>Isi Silinder</p>
					<input type="text" name="slinder" placeholder="" class="txt txt-main-color" id="isi-slinder" required="true">
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Lainnya</H2>
				</div>
				<div class="here">
					<p>Harga Sewa</p>
					<input type="text" name="harga" placeholder="" class="txt txt-main-color" id="harga-sewa" required="true">
				</div>
				<div class="here">
					<p>Tahun Mobil</p>
					<input type="text" name="tahun" placeholder="" class="txt txt-main-color" id="tahun-mobil" required="true">
				</div>
			</div>
		</div>
		<div class="side">
			<div class="frame-reservasi reservasi-side">
				<div class="here">
					<H2>Pilih Gambar</H2>
				</div>
				<div class="here">
					<input type="file" name="foto" id="foto" onchange="loadCover()" required="true">
					<label for="foto">
						<div class="frame-foto" id="place-foto">
							<span class="fa fa-lg fa-plus"></span>
						</div>
					</label>
				</div>
				<div class="here">
					<input type="submit" name="save" class="btn btn-main-color" id="btn-submit" value="Tambahkan Data">
				</div>
			</div>
		</div>
	</div>
</div>
</form>
@endsection

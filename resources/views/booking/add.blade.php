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
		var nomor_identitas = $('#nomor-identitas').val();
		var nama = $('#nama-lengkap').val();
		var jenis_kelamin = $('#jenis-kelamin').val();
		var email = $('#email').val();
		var alamat = $('#alamat-lengkap').text();
		var nomor_telpon = $('#nomor-telpon').val();
		var status_penyewa = $('#status-penyewa').val();
		var tanggal_penyewaan = $('#tanggal-penyewaan').val();
		var tanggal_akhir_penyewaan = $('#tanggal-akhir-penyewaan').val();

		var id_mobil = $('#id-mobil').val();
		var harga_sewa = $('#harga-sewa').val();
		var lama_penyewaan = $('#lama-pinjam').val();
		var total_biaya = $('#total-biaya').val();

		fd.append('id_mobil', id_mobil);
		fd.append('harga_sewa', harga_sewa);
		fd.append('lama_penyewaan', lama_penyewaan);
		fd.append('cover', cover);
		fd.append('nomor_identitas', nomor_identitas);
		fd.append('nama', nama);
		fd.append('jenis_kelamin', jenis_kelamin);
		fd.append('email', email);
		fd.append('alamat', alamat);
		fd.append('nomor_telpon', nomor_telpon);
		fd.append('status_penyewa', status_penyewa);
		fd.append('tanggal_penyewaan', tanggal_penyewaan);
		fd.append('tanggal_akhir_penyewaan', tanggal_akhir_penyewaan);
		fd.append('total_biaya', total_biaya);
		$.each($('#form-publish').serializeArray(), function(a, b) {
		   	fd.append(b.name, b.value);
		});

		$.ajax({
		  	url: '{{ url("/add/booking/publish") }}',
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
		   		alert('Gagal Menambahkan Penyewaan.');
		   		$('#btn-submit').val('Tambahkan Data');
		   	} else {
				window.location = '{{ url("/data/booking") }}';
		   	}
		})
		.fail(function(data) {
		  	alert('error terjadi, mohon ulangi lagi nanti.');
		  	console.log(data.responseJSON);
		  	$('#btn-submit').val('Tambahkan Data');
		});

		return false;
	}
	$(document).ready(function() {
		var startDate,
        endDate,
        updateStartDate = function() {
            startPicker.setStartRange(startDate);
            endPicker.setStartRange(startDate);
            endPicker.setMinDate(startDate);
        },
        updateEndDate = function() {
            startPicker.setEndRange(endDate);
            startPicker.setMaxDate(endDate);
            endPicker.setEndRange(endDate);
        },
        startPicker = new Pikaday({
            field: document.getElementById('tanggal-penyewaan'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            maxDate: new Date(2020, 12, 31),
            onSelect: function() {
                startDate = this.getDate();
                updateStartDate();
            }
        }),
        endPicker = new Pikaday({
            field: document.getElementById('tanggal-akhir-penyewaan'),
            format: 'YYYY-MM-DD',
            minDate: new Date(),
            maxDate: new Date(2030, 12, 31),
            onSelect: function() {
                endDate = this.getDate();
                updateEndDate();
            }
        }),
        _startDate = startPicker.getDate(),
        _endDate = endPicker.getDate();

        if (_startDate) {
            startDate = _startDate;
            updateStartDate();
        }

        if (_endDate) {
            endDate = _endDate;
            updateEndDate();
        }

        $('.date-picker').on('change', function(event) {
        	event.preventDefault();
        	var dt1 = new Date($('#tanggal-penyewaan').val());
        	var dt2 = new Date($('#tanggal-akhir-penyewaan').val());
        	$('#lama-pinjam').val(rangeDay(dt1, dt2));

			var price = $('#harga-sewa').val();
			var ttl = (rangeDay(dt1, dt2) * price);
			$('#total-biaya').val(ttl);
        });

	});
</script>
<form id="form-publish" method="post" action="javascript:void(0)" enctype="multipart/form-data" onsubmit="publish()">
<div class="frame-home">
	<div class="reservasi">
		<div class="main">
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Mobil</H2>
				</div>
				@foreach ($mobil as $mb)
				<div class="here">
					<p>ID Mobil</p>
					<input type="text" name="id-mobil" placeholder="" class="txt txt-main-color" required="true" disabled="true" value="{{ $mb->id_mobil }}" id="id-mobil">
				</div>
				<div class="here">
					<p>Nama Mobil</p>
					<input type="text" name="nama-mobil" placeholder="" class="txt txt-main-color" required="true" disabled="true" value="{{ $mb->nama }}" id="nama-mobil">
				</div>
				<div class="here">
					<p>Harga Sewa Mobil</p>
					<input type="text" name="harga-sewa" placeholder="" class="txt txt-main-color" required="true" disabled="true" value="{{ $mb->harga_sewa }}" id="harga-sewa">
				</div>
				@endforeach
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Penyewa</H2>
				</div>
				<div class="here">
					<p>Nomor Identitas</p>
					<input type="text" name="name" placeholder="" class="txt txt-main-color" required="true" id="nomor-identitas">
				</div>
				<div class="here">
					<p>Nama Lengkap</p>
					<input type="text" name="nama" placeholder="" class="txt txt-main-color" required="true" id="nama-lengkap">
				</div>
				<div class="here">
					<p>Jenis Kelamin</p>
					<select class="select" required="true" id="jenis-kelamin">
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
				<div class="here">
					<p>Email</p>
					<input type="text" name="email" placeholder="" class="txt txt-main-color" required="true" id="email-penyewa">
				</div>
				<div class="here">
					<p>No. Telpon</p>
					<input type="text" name="name" placeholder="" class="txt txt-main-color" required="true" id="nomor-telpon">
				</div>
				<div class="here">
					<p>Alamat Lengkap</p>
					<div class="txt-main-color editable" contenteditable="true" id="alamat-lengkap"></div>
				</div>
				<div class="here">
					<p>Setatus Penyewa</p>
					<select class="select" required="true" id="status-penyewa">
						<option value="Biasa">Biasa</option>
						<option value="Member">Member</option>
					</select>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Foto Kartu Identitas</H2>
				</div>
				<div class="here">
					<input type="file" name="foto" id="foto" onchange="loadCover()">
					<label for="foto">
						<div class="frame-foto" id="place-foto">	
							<span class="fa fa-lg fa-plus"></span>
						</div>
					</label>
				</div>
			</div>
		</div>
		<div class="side">
			<div class="frame-reservasi reservasi-side">
				<div class="here">
					<H2>Pilih Tanggal Penyewaan</H2>
				</div>
				<div class="here">
					<p>Tanggal Penyewaan</p>
					<input type="text" name="tanggal-penyewaan" placeholder="0000-00-00" class="date-picker txt txt-main-color" required="true" id="tanggal-penyewaan">
				</div>
				<div class="here">
					<p>Tanggal Akhir Penyewaan</p>
					<input type="text" name="tanggal-akhir-penyewaan" placeholder="0000-00-00" class="date-picker txt txt-main-color" required="true" id="tanggal-akhir-penyewaan">
				</div>
				<div class="here">
					<p>Lama Penyewaan</p>
					<input type="text" name="lama-pinjam" placeholder="" class="txt txt-main-color" required="true" id="lama-pinjam" disabled="true">
				</div>
				<div class="here">
					<p>Total Biaya</p>
					<input type="text" name="total-biaya" placeholder="" class="txt txt-main-color" required="true" id="total-biaya" disabled="true">
				</div>
				<div class="here">
					<input type="submit" name="save" class="btn btn-main-color" value="Tambahkan Penyewaan" id="btn-submit">
				</div>
			</div>
		</div>
	</div>
</div>
</form>
@endsection


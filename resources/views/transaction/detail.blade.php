@extends('layout.index')
@section('title',$title)
@section('content')
@foreach ($sewa as $sw)
<div class="frame-home">
	<div class="reservasi">
		<div class="main">
			<div class="frame-reservasi">
				<div class="here">
					<h2>Cetak Laporan</h2>
				</div>
				<div class="here">
					<button class="btm btn btn-main-color">Cetak Laporan</button>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Detail Admin</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID Admin</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $sw->id_admin }}</strong></td>
							</tr>
							<tr>
								<td>Nama Admin</td>
								<td>:</td>
								<td>{{ $sw->nama_admin }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Detail Penyewa</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID Penyewa</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $sw->id_penyewa }}</strong></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td>{{ $sw->nama_penyewa }}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>{{ $sw->jenis_kelamin }}</td>
							</tr>
							<tr>
								<td>Nomor Telpon</td>
								<td>:</td>
								<td>{{ $sw->telp }}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td>{{ $sw->email }}</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td>{{ $sw->alamat }}</td>
							</tr>
							<tr>
								<td>Status Member</td>
								<td>:</td>
								<td>{{ $sw->status_member }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="here">
					<a href="{{ url('/data/booking/detail/'.$sw->id_penyewa) }}">
						<button class="btm btn btn-sekunder-color">Detail</button>
					</a>
				</div>
				<div class="here">
					<a href="{{ url('/data/booking/edit/'.$sw->id_penyewa) }}">
						<button class="btm btn btn-sekunder-color">Ubah</button>
					</a>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Detail Mobil</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID Mobil</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $sw->id_mobil }}</strong></td>
							</tr>
							<tr>
								<td>Nama Mobil</td>
								<td>:</td>
								<td>{{ $sw->nama_mobil }}</td>
							</tr>
							<tr>
								<td>Jenis Mobil</td>
								<td>:</td>
								<td>{{ $sw->jenis }}</td>
							</tr>
							<tr>
								<td>Merk Mobil</td>
								<td>:</td>
								<td>{{ $sw->merk }}</td>
							</tr>
							<tr>
								<td>Warna Mobil</td>
								<td>:</td>
								<td>{{ $sw->warna }}</td>
							</tr>
							<tr>
								<td>Tahun Mobil</td>
								<td>:</td>
								<td>{{ $sw->tahun }}</td>
							</tr>
							<tr>
								<td>No. Polisi</td>
								<td>:</td>
								<td>{{ $sw->plat_nomor }}</td>
							</tr>
							<tr>
								<td>No. Mesin</td>
								<td>:</td>
								<td>{{ $sw->no_mesin }}</td>
							</tr>
							<tr>
								<td>No. Rangka</td>
								<td>:</td>
								<td>{{ $sw->no_rangka }}</td>
							</tr>
							<tr>
								<td>Isi Silinder</td>
								<td>:</td>
								<td>{{ $sw->isi_silinder }}</td>
							</tr>
							<tr>
								<td>Status Mobil</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $sw->status }}</strong></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="here">
					<a href="{{ url('/data/car/detail/'.$sw->id_mobil) }}">
						<button class="btm btn btn-sekunder-color">Detail</button>
					</a>
				</div>
				<div class="here">
					<a href="{{ url('/data/car/edit/'.$sw->id_mobil) }}">
						<button class="btm btn btn-sekunder-color">Ubah</button>
					</a>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Lainnya</H2>
				</div>
				<div class="here">
					<p>Bagian ini bisa berisi catatan untuk Admin.</p>
				</div>
			</div>
		</div>
		<div class="side">
			<div class="frame-reservasi reservasi-side">
				<div class="here">
					<H2>Detail Pembayaran</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $sw->id_sewa }}</strong></td>
							</tr>
							<tr>
								<td>Tanggal Pinjam</td>
								<td>:</td>
								<td>{{ $sw->tgl_pinjam }}</td>
							</tr>
							<tr>
								<td>Tanggal Akhir Pinjam</td>
								<td>:</td>
								<td>{{ $sw->tgl_akhir_pinjam }}</td>
							</tr>
							<tr>
								<td>Lama Pinjam</td>
								<td>:</td>
								<td>{{ $sw->lama_pinjam }} Hari</td>
							</tr>
							<tr>
								<td>Harga Sewa</td>
								<td>:</td>
								<td><strong class="maincolor">Rp. {{ $sw->harga_sewa }}</strong></td>
							</tr>
							<tr>
								<td>Total Pembayaran</td>
								<td>:</td>
								<td><strong class="maincolor">Rp. {{ $sw->total_bayar }}</strong></td>
							</tr>
							<tr>
								<td>Status Sewa</td>
								<td>:</td>
								<td>{{ $sw->status_sewa }}</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="here">
					<a href="{{ url('/data/transaction/edit/'.$sw->id_sewa) }}">
						<button class="btm btn btn-sekunder-color">Ubah</button>
					</a>
					<button class="btm btn btn-sekunder-color" onclick="deleteTransaksi('{{ $sw->id_sewa }}')">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection

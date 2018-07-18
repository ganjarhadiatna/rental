@extends('layout.index')
@section('title',$title)
@section('content')
@foreach ($booking as $mb)
<div class="frame-home">
	<div class="reservasi">
		<div class="main">
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Penyewa</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID Penyewa</td>
								<td>:</td>
								<td>{{ $mb->id_penyewa }}</td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>:</td>
								<td>{{ $mb->nama }}</td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td>:</td>
								<td>{{ $mb->jenis_kelamin }}</td>
							</tr>
							<tr>
								<td>Nomor Telpon</td>
								<td>:</td>
								<td>{{ $mb->telp }}</td>
							</tr>
							<tr>
								<td>Email</td>
								<td>:</td>
								<td>{{ $mb->email }}</td>
							</tr>
							<tr>
								<td>Alamat</td>
								<td>:</td>
								<td>{{ $mb->alamat }}</td>
							</tr>
							<tr>
								<td>Status Member</td>
								<td>:</td>
								<td>{{ $mb->status_member }}</td>
							</tr>
						</tbody>
					</table>
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
					<div class="foto-detail" style="background-image: url('{{ asset("img/booking/".$mb->foto) }}');"></div>
				</div>
				<div class="here">
					<button class="btm btn btn-sekunder-color" onclick="toLink('/data/booking/edit/{{ $mb->id_penyewa }}')">Ubah</button>
					<button class="btm btn btn-sekunder-color" onclick="deletePenyewa('{{ $mb->id_penyewa }}', '/data/booking')">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection

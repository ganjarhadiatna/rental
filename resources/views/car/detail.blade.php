@extends('layout.index')
@section('title',$title)
@section('content')
@foreach ($mobil as $mb)
<div class="frame-home">
	<div class="reservasi">
		<div class="main">
			<div class="frame-reservasi">
				<div class="here">
					<H2>Status Mobil</H2>
				</div>
				<div class="here">
					@if ($mb->status == 'Bebas')
						<p class="maincolor">Mobil ini tersedia dan dapat Disewakan.</p>
					@else
						<p class="maincolor">Mobil ini sedang Disewakan.</p>
					@endif
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Mobil</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>ID Mobil</td>
								<td>:</td>
								<td>{{ $mb->id_mobil }}</td>
							</tr>
							<tr>
								<td>Nama Mobil</td>
								<td>:</td>
								<td>{{ $mb->nama }}</td>
							</tr>
							<tr>
								<td>Jenis Mobil</td>
								<td>:</td>
								<td>{{ $mb->jenis }}</td>
							</tr>
							<tr>
								<td>Merk Mobil</td>
								<td>:</td>
								<td>{{ $mb->merk }}</td>
							</tr>
							<tr>
								<td>Warna Mobil</td>
								<td>:</td>
								<td>{{ $mb->warna }}</td>
							</tr>
							<tr>
								<td>Tahun Mobil</td>
								<td>:</td>
								<td>{{ $mb->tahun }}</td>
							</tr>
							<tr>
								<td>Status Mobil</td>
								<td>:</td>
								<td><strong class="maincolor">{{ $mb->status }}</strong></td>
							</tr>
							<tr>
								<td>Harga Sewa Mobil</td>
								<td>:</td>
								<td>{{ 'Rp. '.$mb->harga_sewa }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="frame-reservasi">
				<div class="here">
					<H2>Data Inti Mobil</H2>
				</div>
				<div class="here">
					<table>
						<tbody>
							<tr>
								<td>No. Polisi</td>
								<td>:</td>
								<td>{{ $mb->plat_nomor }}</td>
							</tr>
							<tr>
								<td>No. Mesin</td>
								<td>:</td>
								<td>{{ $mb->no_mesin }}</td>
							</tr>
							<tr>
								<td>No. Rangka</td>
								<td>:</td>
								<td>{{ $mb->no_rangka }}</td>
							</tr>
							<tr>
								<td>Isi Silinder</td>
								<td>:</td>
								<td>{{ $mb->isi_silinder }}</td>
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
					<div class="foto-detail" style="background-image: url('{{ asset("img/mobil/".$mb->foto) }}');"></div>
				</div>
				<div class="here">
					@if ($mb->status == 'Bebas')
						<button class="btm btn btn-main-color" onclick="addBook('{{ $mb->id_mobil }}')">Pesan Mobil</button>
					@endif
					<button class="btm btn btn-sekunder-color" onclick="editMobil('{{ $mb->id_mobil }}')">Ubah</button>
					<button class="btm btn btn-sekunder-color" onclick="deleteMobil('{{ $mb->id_mobil }}')">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@endsection

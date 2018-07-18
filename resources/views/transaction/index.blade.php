@extends('layout.index')
@section('title', $title)
@section('content')
<div class="frame-home">
	<div class="room">
		<div class="frame-reservasi">
			<div class="here">
				<input type="text" name="check-in" placeholder="Cari Transaksi..." class="txt txt-main-color">
				<button class="src btn btn-main-color">
					<span class="fa fa-lg fa-search"></span>
				</button>
			</div>
		</div>
		<div class="frame-reservasi">
			<div class="here">
				<h2>Daftar Transaksi</h2>
				<div class="print">
					<button class="btn btn-main-color">
						<span class="fa fa-lg fa-print"></span>
						<span>Cetak Laporan</span>
					</button>	
				</div>
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Mobil</th>
							<th>Admin</th>
							<th>Nama Peminjam</th>
							<th>Tanggal Penyewaan</th>
							<th>Akhir Penyewaan</th>
							<th>Lama Pinjam</th>
							<th>Harga Sewa</th>
							<th>Total Bayar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $ttl = 0; ?>
						@foreach ($sewa as $sw)
						<tr>
							<td>{{ $sw->id_sewa }}</td>
							<td><div class="foto" style="background-image: url('{{ asset("img/mobil/".$sw->foto) }}');"></td>
							<td>{{ $sw->nama_admin }}</td>
							<td>{{ $sw->nama_penyewa }}</td>
							<td>{{ $sw->tgl_pinjam }}</td>
							<td>{{ $sw->tgl_akhir_pinjam }}</td>
							<td>{{ $sw->lama_pinjam }} Hari</td>
							<td>Rp. {{ $sw->harga_sewa }}</td>
							<td>Rp. {{ $sw->total_bayar }}</td>
							<td>
								<a href="{{ url('/data/transaction/detail/'.$sw->id_sewa) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-eye"></span>
									</button>
								</a>
								<a href="{{ url('/data/transaction/edit/'.$sw->id_sewa) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-pencil"></span>
									</button>
								</a>
								<button class="bg btn btn-primary-color" onclick="deleteTransaksi('{{ $sw->id_sewa }}')">
									<span class="fa fa-lg fa-trash"></span>
								</button>
							</td>
						</tr>
						<?php $ttl = $ttl + $sw->total_bayar; ?>
						@endforeach
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><strong class="maincolor">Rp. {{ $ttl }}</strong></td>
							<td></td>
							<td>
								<button class="bg btn btn-main-color">
									<span class="fa fa-lg fa-print"></span>
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

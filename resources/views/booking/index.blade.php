@extends('layout.index')
@section('title', $title)
@section('content')
<div class="frame-home">
	<div class="room">
		<div class="frame-reservasi">
			<div class="here">
				<input type="text" name="check-in" placeholder="Cari Penyewa..." class="txt txt-main-color">
				<button class="src btn btn-main-color">
					<span class="fa fa-lg fa-search"></span>
				</button>
			</div>
		</div>
		<div class="frame-reservasi">
			<div class="here">
				<h2>Daftar Penyewa</h2>
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>No Identitas</th>
							<th>Nama</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>No. Telp</th>
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach ($booking as $bk)
						<tr>
							<td>{{ $i }}</td>
							<td><div class="foto" style="background-image: url('{{ asset("img/booking/".$bk->foto) }}');"></div></td>
							<td>{{ $bk->nomor_identitas }}</td>
							<td>{{ $bk->nama }}</td>
							<td>{{ $bk->jenis_kelamin }}</td>
							<td>{{ $bk->alamat }}</td>
							<td>{{ $bk->telp }}</td>
							<td>{{ $bk->email }}</td>
							<td>
								<a href="{{ url('/data/booking/detail/'.$bk->id_penyewa) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-eye"></span>
									</button>
								</a>
								<a href="{{ url('/data/booking/edit/'.$bk->id_penyewa) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-pencil"></span>
									</button>
								</a>
								<button class="bg btn btn-primary-color" onclick="deletePenyewa('{{ $bk->id_penyewa }}', '/data/booking')">
									<span class="fa fa-lg fa-trash"></span>
								</button>
							</td>
						</tr>
						<?php $i += 1; ?>
						@endforeach
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

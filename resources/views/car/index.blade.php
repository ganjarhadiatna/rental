@extends('layout.index')
@section('title', $title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('.panel-menu ul li').each(function(index, el) {
			$('.panel-menu ul li').removeClass('active');
		});
		$('.panel-menu ul #{{ $ctr }}').addClass('active');
	});
</script>
<div class="frame-home">
	<div class="room">
		<div class="frame-reservasi">
			<div class="here">
				<input type="text" name="check-in" placeholder="Cari Mobil..." class="txt txt-main-color">
				<button class="src btn btn-main-color">
					<span class="fa fa-lg fa-search"></span>
				</button>
			</div>
		</div>
		<div class="frame-reservasi">
			<div class="here">
				<h2>Daftar Mobil</h2>
				<div class="plus">
					<a href="{{ url('/add/car') }}">
						<button class="btn btn-main-color">
							<span class="fa fa-lg fa-plus"></span>
							<span>Tambah Mobil</span>
						</button>
					</a>
					<div class="panel-menu">
						<ul>
							<a href="{{ url('/data/car') }}">
						    	<li class="active" id="all">Semua</li>
						    </a>
						    <a href="{{ url('/data/car/disewa') }}">
						    	<li id="disewa">Disewa</li>
						    </a>
						    <a href="{{ url('/data/car/bebas') }}">
						    	<li id="bebas">Bebas</li>
						    </a>
						</ul>
					</div>
				</div>
				<table>
					<thead>
						<tr>
							<th>No</th>
							<th>Foto</th>
							<th>Nama</th>
							<th>No. Polisi</th>
							<th>Merk</th>
							<th>Warna</th>
							<th>Tahun</th>
							<th>Harga</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1; ?>
						@foreach($mobil as $mb)
						<tr>
							<td>{{ $i }}</td>
							<td><div class="foto" style="background-image: url('{{ asset("img/mobil/".$mb->foto) }}');"></div></td>
							<td>{{ $mb->nama }}</td>
							<td>{{ $mb->plat_nomor }}</td>
							<td>{{ $mb->merk }}</td>
							<td>{{ $mb->warna }}</td>
							<td>{{ $mb->tahun }}</td>
							<td>Rp. {{ $mb->harga_sewa }}</td>
							<td>
								<div class="status btn btn-{{ strtolower($mb->status) }}-color">
									{{ $mb->status }}
								</div>
							</td>
							<td>
								<a href="{{ url('/data/car/detail/'.$mb->id_mobil) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-eye"></span>
									</button>
								</a>
								<a href="{{ url('/data/car/edit/'.$mb->id_mobil) }}">
									<button class="bg btn btn-primary-color">
										<span class="fa fa-lg fa-pencil"></span>
									</button>
								</a>
								<button class="bg btn btn-primary-color" onclick="deleteMobil('{{ $mb->id_mobil }}', 'data/car')">
									<span class="fa fa-lg fa-trash"></span>
								</button>
							</td>
						</tr>
						<?php $i += 1; ?>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection


@extends('layout.index')
@section('title',$title)
@section('content')
<script type="text/javascript">
	$(document).ready(function() {
		$('.panel-menu ul li').each(function(index, el) {
			$('.panel-menu ul li').removeClass('active');
		});
		$('.panel-menu ul #{{ $ctr }}').addClass('active');
	});
</script>
<div class="frame-home-2">
	<div class="room">
		<div class="panel-menu">
			<ul>
				<a href="{{ url('/dashboard') }}">
			    	<li id="all">Semua</li>
			    </a>
			    <a href="{{ url('/dashboard/disewa') }}">
			    	<li id="disewa">Disewa</li>
			    </a>
			    <a href="{{ url('/dashboard/bebas') }}">
			    	<li id="bebas">Bebas</li>
			    </a>
			</ul>
		</div>
	</div>
</div>
<div class="frame-home">
	@foreach($mobil as $mb)
	<div class="frame-car">
		<a href="{{ url('/data/car/detail/'.$mb->id_mobil) }}">
			<div class="top" title="lihat detail" style="background-image: url('{{ asset("img/mobil/".$mb->foto) }}');">
				<div class="clr">{{ $mb->warna }}</div>
				<div class="stt btn-{{ strtolower($mb->status) }}-color">{{ $mb->status }}</div>
			</div>
		</a>
		<div class="mid">
			<h2>{{ $mb->nama }}</h2>
			<h3>Rp. {{ $mb->harga_sewa }}</h3>
			<p>{{ $mb->jenis.' | '.$mb->tahun.' | '.$mb->plat_nomor }}</p>
		</div>
		<div class="bot">
			@if ($mb->status == 'Bebas')
				<input type="button" name="pesan" class="btn btn-main-color" value="Pesan Mobil" onclick="addBook('{{ $mb->id_mobil }}')">
			@else
				<input type="button" name="pesan" class="btn btn-main-color" value="Disewakan" disabled="disabled" style="cursor: not-allowed;">
			@endif
		</div>
	</div>
	@endforeach
</div>
@endsection
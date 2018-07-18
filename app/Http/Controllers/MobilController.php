<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

use App\MobilModel;

class MobilController extends Controller
{
    function publish(Request $request)
    {
    	$id = session()->get('iduser');
    	$cover= $request['cover'];
		$nama= $request['nama'];
		$jenis= $request['jenis'];
		$merk= $request['merk'];
		$warna= $request['warna'];
		$nomor_polisi= $request['nomor_polisi'];
		$nomor_rangka= $request['nomor_rangka'];
		$nomor_mesin= $request['nomor_mesin'];
		$slinder= $request['slinder'];
		$harga= $request['harga'];
		$tahun= $request['tahun'];

		//setting cover
    	$this->validate($request, [
    		'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    	]);
    	
    	$image = $request->file('cover');
	    $chrc = array('[',']','@',' ','+','-','#','*','<','>','_','(',')',';',',','&','%','$','!','`','~','=','{','}','/',':','?','"',"'",'^');
		$filename = $id.time().str_replace($chrc, '', $image->getClientOriginalName());

		//create image real
	    $destination = 'img/mobil/';
	    $image->move($destination, $filename);

		$data = array(
			'plat_nomor' => $nomor_polisi,
			'no_rangka' => $nomor_rangka,
			'no_mesin' => $nomor_mesin,
			'nama' => $nama,
			'jenis' => $jenis,
			'merk' => $merk,
			'warna' => $warna,
			'isi_silinder' => $slinder,
			'tahun' => $tahun,
			'harga_sewa' => $harga,
			'status' => 'Bebas',
			'foto' => $filename
		);

		$rest = MobilModel::Publish($data);
		if ($rest) {
			echo $rest;	
		} else {
			echo "failed";
		}
    	
    }
    function delete(Request $request)
    {
    	$id_mobil= $request['id'];
    	$rest = MobilModel::Remove($id_mobil);
		if ($rest) {
			echo $id_mobil;	
		} else {
			echo "failed";
		}
    }
    function edit(Request $request)
    {
    	$id = session()->get('iduser');
    	$id_mobil= $request['id'];
		$nama= $request['nama'];
		$jenis= $request['jenis'];
		$merk= $request['merk'];
		$warna= $request['warna'];
		$nomor_polisi= $request['nomor_polisi'];
		$nomor_rangka= $request['nomor_rangka'];
		$nomor_mesin= $request['nomor_mesin'];
		$slinder= $request['slinder'];
		$harga= $request['harga'];
		$tahun= $request['tahun'];
		$status= $request['status'];

		$data = array(
			'plat_nomor' => $nomor_polisi,
			'no_rangka' => $nomor_rangka,
			'no_mesin' => $nomor_mesin,
			'nama' => $nama,
			'jenis' => $jenis,
			'merk' => $merk,
			'warna' => $warna,
			'isi_silinder' => $slinder,
			'tahun' => $tahun,
			'status' => $status,
			'harga_sewa' => $harga
		);

		$rest = MobilModel::Edit($data, $id_mobil);
		if ($rest) {
			echo $id_mobil;	
		} else {
			echo "failed";
		}
    	
    }
}

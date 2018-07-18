<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;

use App\BookingModel;
use App\MobilModel;

class BookingController extends Controller
{
	function deleteSewa(Request $request)
	{
		$id_sewa = $request['id_sewa'];
		$rest = BookingModel::DeleteSewa($id_sewa);
		if ($rest) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	function editSewa(Request $request)
	{
		$id_sewa = $request['id_sewa'];
		$tgl_pinjam = $request['tgl_pinjam'];
		$tgl_akhir_pinjam = $request['tgl_akhir_pinjam'];
		$lama_pinjam = $request['lama_pinjam'];
		$harga_sewa = $request['harga_sewa'];
		$total_bayar = $request['total_bayar'];
		$status_sewa = $request['status_sewa'];
		$data = array(
			'id_sewa' => $id_sewa,
            'tgl_pinjam' => $tgl_pinjam,
            'tgl_akhir_pinjam' => $tgl_akhir_pinjam,
            'lama_pinjam' => $lama_pinjam,
            'harga_sewa' => $harga_sewa,
            'total_bayar' => $total_bayar,
            'status_sewa' => $status_sewa
		);
		$rest = BookingModel::UpdateSewa($data, $id_sewa);
		if ($rest) {
			echo $id_sewa;
		} else {
			echo 'failed';
		}
	}

	function deleteUser(Request $request)
	{
		$id_penyewa = $request['id_penyewa'];
		$rest = BookingModel::DeletePenyewa($id_penyewa);
		if ($rest) {
			echo "success";
		} else {
			echo "failed";
		}
	}
	function editUser(Request $request)
	{
		$id_penyewa = $request['id_penyewa'];
		$nomor_identitas = $request['nomor_identitas'];
		$nama = $request['nama'];
		$jenis_kelamin = $request['jenis_kelamin'];
		$telp = $request['telp'];
		$email = $request['email'];
		$alamat = $request['alamat'];
		$status_member = $request['status_member'];
		//data penyewa
		$data = array(
			'id_penyewa' => $id_penyewa,
			'nomor_identitas' => $nomor_identitas,
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
			'telp' => $telp,
			'status_member' => $status_member
		);
		$rest = BookingModel::EditPenyewa($data, $id_penyewa);
		if ($rest) {
			echo $id_penyewa;
		} else {
			echo "failed";
		}
	}
    function publish(Request $request)
    {
    	$id = session()->get('iduser');
    	$id_mobil = $request['id_mobil'];
    	$harga_sewa = $request['harga_sewa'];
    	$lama_penyewaan = $request['lama_penyewaan'];
    	$cover = $request['cover'];
		$nomor_identitas = $request['nomor_identitas'];
		$nama = $request['nama'];
		$jenis_kelamin = $request['jenis_kelamin'];
		$email = $request['email'];
		$alamat = $request['alamat'];
		$nomor_telpon = $request['nomor_telpon'];
		$status_penyewa = $request['status_penyewa'];
		$tanggal_penyewaan = $request['tanggal_penyewaan'];
		$tanggal_akhir_penyewaan = $request['tanggal_akhir_penyewaan'];
		$total_bayar = $request['total_biaya'];

		//setting cover
    	$this->validate($request, [
    		'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    	]);
    	
    	$image = $request->file('cover');
	    $chrc = array('[',']','@',' ','+','-','#','*','<','>','_','(',')',';',',','&','%','$','!','`','~','=','{','}','/',':','?','"',"'",'^');
		$filename = $id.time().str_replace($chrc, '', $image->getClientOriginalName());

		//create image real
	    $destination = 'img/booking/';
	    $image->move($destination, $filename);

		//data penyewa
		$data = array(
			'nomor_identitas' => $nomor_identitas,
			'nama' => $nama,
			'email' => $email,
			'alamat' => $alamat,
			'jenis_kelamin' => $jenis_kelamin,
			'telp' => $nomor_telpon,
			'status_member' => $status_penyewa,
			'foto' => $filename
		);
		$rest1 = BookingModel::AddPenyewa($data);
		if ($rest1) {
			//dapatkan id penyewa
			$id_penyewa = BookingModel::GetIDPenyewa();

			//data sewa
			$data2 = array(
				'tgl_pinjam' => $tanggal_penyewaan,
				'lama_pinjam' => $lama_penyewaan,
				'tgl_akhir_pinjam' => $tanggal_akhir_penyewaan,
				'harga_sewa' => $harga_sewa,
				'total_bayar' => $total_bayar,
				'id_admin' => $id,
				'id_penyewa' => $id_penyewa,
				'id_mobil' => $id_mobil,
				'status_sewa' => 'Belum Selesai'
			);
			$rest2 = BookingModel::AddSewa($data2);	
			if ($rest2) {
				MobilModel::Edit(array('status' => 'Disewa'), $id_mobil);
				echo "success";
			} else {
				echo "failed";
			}
		} else {
			echo "failed";
		}

    }
}

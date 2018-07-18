<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BookingModel extends Model
{
	function scopeGetIDPenyewa($query)
    {
    	return DB::table('penyewa')
    	->orderBy('penyewa.id_penyewa', 'desc')
    	->limit(1)
    	->value('id_penyewa');
    }
    function scopeDeletePenyewa($query, $id)
    {
        return DB::table('penyewa')
        ->where('penyewa.id_penyewa', $id)
        ->delete();
    }
    function scopeEditPenyewa($query, $data, $id)
    {
        return DB::table('penyewa')
        ->where('penyewa.id_penyewa', $id)
        ->update($data);
    }
    function scopeAddPenyewa($query, $data)
    {
    	return DB::table('penyewa')
    	->insert($data);
    }

    function scopeDeleteSewa($query, $id)
    {
        return DB::table('sewa')
        ->where('sewa.id_sewa', $id)
        ->delete();
    }
    function scopeUpdateSewa($query, $data, $id_sewa)
    {
        return DB::table('sewa')
        ->where('sewa.id_sewa', $id_sewa)
        ->update($data);
    }
    function scopeAddSewa($query, $data)
    {
    	return DB::table('sewa')
    	->insert($data);
    }
    function scopeGetDataPenyewa($query)
    {
    	return DB::table('penyewa')
    	->select(
    		'penyewa.id_penyewa',
    		'penyewa.nomor_identitas',
    		'penyewa.nama',
    		'penyewa.alamat',
    		'penyewa.telp',
    		'penyewa.foto',
    		'penyewa.email',
    		'penyewa.jenis_kelamin',
            'penyewa.status_member'
    	)
    	->orderBy('penyewa.id_penyewa', 'desc')
    	->get();
    }
    function scopeGetDataPenyewaId($query, $id)
    {
        return DB::table('penyewa')
        ->select(
            'penyewa.id_penyewa',
            'penyewa.nomor_identitas',
            'penyewa.nama',
            'penyewa.alamat',
            'penyewa.telp',
            'penyewa.foto',
            'penyewa.email',
            'penyewa.jenis_kelamin',
            'penyewa.status_member'
        )
        ->where('penyewa.id_penyewa', $id)
        ->orderBy('penyewa.id_penyewa', 'desc')
        ->get();
    }
    function scopeGetDataSewa($query)
    {
    	return DB::table('sewa')
    	->select(
    		'sewa.id_sewa',
    		'sewa.tgl_pinjam',
            'sewa.tgl_akhir_pinjam',
    		'sewa.lama_pinjam',
    		'sewa.harga_sewa',
    		'sewa.total_bayar',
    		'sewa.status_sewa',
    		'penyewa.nama as nama_penyewa',
    		'penyewa.alamat',
    		'penyewa.telp',
    		'mobil.nama as nama_mobil',
    		'mobil.foto',
    		'admin.nama as nama_admin'
    	)
    	->join('penyewa','penyewa.id_penyewa','=','sewa.id_penyewa')
    	->join('mobil','mobil.id_mobil','=','sewa.id_mobil')
    	->join('admin','admin.id_admin','=','sewa.id_admin')
    	->orderBy('sewa.id_sewa', 'desc')
    	->get();
    }
    function scopeGetDataSmallSewaId($query, $id_sewa)
    {
        return DB::table('sewa')
        ->select(
            'sewa.id_sewa',
            'sewa.tgl_pinjam',
            'sewa.tgl_akhir_pinjam',
            'sewa.lama_pinjam',
            'sewa.harga_sewa',
            'sewa.total_bayar',
            'sewa.status_sewa'
        )
        ->where('sewa.id_sewa', $id_sewa)
        ->get();
    }
    function scopeGetDataSewaId($query, $id_sewa)
    {
        return DB::table('sewa')
        ->select(
            'sewa.id_sewa',
            'sewa.tgl_pinjam',
            'sewa.tgl_akhir_pinjam',
            'sewa.lama_pinjam',
            'sewa.harga_sewa',
            'sewa.total_bayar',
            'sewa.status_sewa',
            'penyewa.id_penyewa',
            'penyewa.nomor_identitas',
            'penyewa.nama as nama_penyewa',
            'penyewa.email',
            'penyewa.alamat',
            'penyewa.jenis_kelamin',
            'penyewa.foto as foto_penyewa',
            'penyewa.telp',
            'penyewa.status_member',
            'mobil.id_mobil',
            'mobil.plat_nomor',
            'mobil.no_mesin',
            'mobil.no_rangka',
            'mobil.isi_silinder',
            'mobil.nama as nama_mobil',
            'mobil.jenis',
            'mobil.merk',
            'mobil.warna',
            'mobil.tahun',
            'mobil.status',
            'mobil.foto as foto_mobil',
            'admin.id_admin',
            'admin.nama as nama_admin'
        )
        ->where('sewa.id_sewa', $id_sewa)
        ->join('penyewa','penyewa.id_penyewa','=','sewa.id_penyewa')
        ->join('mobil','mobil.id_mobil','=','sewa.id_mobil')
        ->join('admin','admin.id_admin','=','sewa.id_admin')
        ->orderBy('sewa.id_sewa', 'desc')
        ->get();
    }
    function scopeGetDataSewaSuccess($query)
    {
    	return DB::table('sewa')
    	->select(
    		'sewa.id_sewa',
    		'sewa.tgl_pinjam',
    		'sewa.lama_pinjam',
    		'sewa.harga_sewa',
    		'sewa.total_bayar',
    		'sewa.status_sewa',
    		'penyewa.nama as nama_penyewa',
    		'penyewa.alamat',
    		'penyewa.telp',
    		'penyewa.foto',
    		'penyewa.email',
    		'penyewa.jenis_kelamin',
    		'mobil.nama as nama_mobil'
    	)
    	->join('penyewa','penyewa.id_penyewa','=','sewa.id_penyewa')
    	->join('mobil','mobil.id_mobil','=','sewa.id_mobil')
    	->where('')
    	->orderBy('sewa.id_sewa', 'desc')
    	->get();
    }
}

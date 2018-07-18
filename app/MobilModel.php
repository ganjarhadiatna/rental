<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MobilModel extends Model
{
    function scopePublish($query, $data)
    {
    	return DB::table('mobil')->insert($data);
    }
    function scopeEdit($query, $data, $id)
    {
    	return DB::table('mobil')->where('mobil.id_mobil', $id)->update($data);
    }
    function scopeRemove($query, $id)
    {
    	return DB::table('mobil')->where('mobil.id_mobil', $id)->delete();
    }
    function scopeGetDetailMobil($query, $id) 
    {
    	return DB::table('mobil')
    	->select('*')
    	->where('id_mobil', $id)
    	->get();
    }
    function scopeGetMobilStatus($query, $ctr)
    {
        return DB::table('mobil')
        ->select(
            'id_mobil',
            'nama',
            'jenis',
            'warna',
            'merk',
            'plat_nomor',
            'harga_sewa',
            'foto',
            'status',
            'tahun'
        )
        ->where('status', $ctr)
        ->orderBy('id_mobil', 'desc')
        ->get();
    }
    function scopeGetMobil($query) 
    {
    	return DB::table('mobil')
    	->select(
    		'id_mobil',
    		'nama',
    		'jenis',
    		'warna',
    		'merk',
    		'plat_nomor',
    		'harga_sewa',
    		'foto',
            'status',
    		'tahun'
    	)
    	->orderBy('id_mobil', 'desc')
    	->get();
    }
}

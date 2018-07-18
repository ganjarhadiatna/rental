<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminModel extends Model
{
    function scopeLogin($query, $username, $password)
    {
    	return DB::table('admin')
    	->where('username', $username)
    	->where('password', $password)
    	->value('id_admin');
    }
}

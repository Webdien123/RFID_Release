<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Hash;

class taikhoan extends Model
{
    protected $table = "taikhoan";
    protected $primaryKey = 'uname';
    public $timestamps = false;

    public function KT_taikhoan($password)
    {
    	if (Hash::check($password, $this->pass)) {
    		return true;
    	} else {
    		return false;
    	}
    }
}

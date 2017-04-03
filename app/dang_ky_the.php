<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dang_ky_the extends Model
{
    protected $table = "dang_ky_the";
    public $timestamps = false;
    protected $keyType = 'string';

    public function sinhvien()
    {
    	return $this->belongsTo('App\sinhvien', 'mssv', 'mssv');
    }

    public static function Them_The($id, $mssv)
    {
    	$dkthe = new dang_ky_the();
        $dkthe->id = $id;
        $dkthe->mssv = $mssv;
        $dkthe->save();
    }
}

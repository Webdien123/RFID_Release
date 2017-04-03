<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sinhvien extends Model
{
    protected $table = "sinhvien";
    public $timestamps = false;
    protected $primaryKey = 'mssv';
    protected $keyType = 'string';

    public function the()
    {
    	return $this->hasOne('App\dang_ky_the', 'mssv');
    }

    public static function Them_SV($mssv, $hoten, $sdt, $ngsinh)
    {
    	$sinhvien = new sinhvien();
        $sinhvien->hoten = $hoten;
        $sinhvien->mssv = $mssv;
        $sinhvien->sdt = $sdt;
        $sinhvien->ngsinh = $ngsinh;
        $sinhvien->dangki = false;
        $sinhvien->save();
    }

    public static function CapNhat_SV($mssv, $hoten, $sdt, $ngsinh)
    {
    	$sinhvien = sinhvien::find($mssv);
    	echo "tim thay sv";
        $sinhvien->hoten = $hoten;
        $sinhvien->sdt = $sdt;
        $sinhvien->ngsinh = $ngsinh;
        echo "doi thong tin \nhoten = ".$sinhvien->hoten."\nsdt = ".$sinhvien->sdt."\nngsinh = ".$sinhvien->ngsinh;
        try {
        	$sinhvien->save();	
        } catch (\Exception $e) {
        	\Session::put('kq_dki', 'failed_update');
            return redirect('/SuaSV/' . $request->mssv);
        }   
    }

    public static function CapNhat_DangKi($mssv)
    {
    	try {
	    	$sinhvien = sinhvien::find($mssv);
	    	if ($sinhvien->dangki == true) {
	    		$sinhvien->dangki = false;
	    	} else {
	    		$sinhvien->dangki = true;
	    	}
	        $sinhvien->save();
        } catch (\Exception $e) {
            \Session::put('kq_dki', 'failed_sv');
            return redirect('trangquantri');
        }
    }

}

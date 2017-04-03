<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\taikhoan;
use App\sinhvien;
use App\dang_ky_the;

class MyController extends Controller
{
    public function GetViewHome(Request $request)
    {
        return view('home');
    }

    public function Res_card(Request $request)
    {
        $the = dang_ky_the::find($request->id);
        if($the){
            $sv = $the->sinhvien;
            return view('input_card',['mathe'=>($request->id), 'sv' => $sv]);    
        }
        else{
            return view('non_res_card');
        }
    }

    public function goAdmin()
    {
        if (\Session::has('uname')) {
            $danhsachsv = \DB::table('sinhvien')->where('dangki', false)->Paginate(5);
            return view('admin', ['danhsachsv' => $danhsachsv]);
        }
        else{
            return view('login');
        }
    }

    public function login_process(Request $request)
    {
        $taikhoan = taikhoan::find($request->uname);
        if ($taikhoan == null) {
            \Session::put('err', '1');
            return view('login');
        }
        
        if ($taikhoan->KT_taikhoan($request->pass)) {
            \Session::put('uname', $request->uname);
            return redirect()->route('goAdmin');
        } else {
            \Session::put('err', '1');
            return view('login');
        }
    }

    public function logout()
    {
        \Session::forget('uname');
        \Session::forget('err');
        return redirect()->route('GetViewHome');
    }

    public function AddSV(Request $request)
    {
        try {
            sinhvien::Them_SV($request->mssv, $request->hoten, $request->sdt, 
                $request->ngsinh);
        } catch (\Exception $e) {
            return redirect()->route('Error', 
                ['mes' => 'Thêm sinh viên thất bại', 'reason' => 'Mã số sinh viên đã tồn tại']);
        }
        return redirect()->route('goAdmin');
    }

    public static function XoaSV($mssv)
    {
        $sinhvien = sinhvien::find($mssv);
        if ($sinhvien != null) {
            try {
                $sinhvien->delete();
                return redirect()->route('goAdmin');
            } catch (\Exception $e) {
                return redirect()->route('Error', 
                ['mes' => 'Xóa Sinh viên thất bại', 'reason' => '']);
            }
        }
        else{
            return redirect()->route('Error', 
                ['mes' => 'Xóa sinh viên thất bại', 'reason' => 'Không tìm thấy sinh viên, vui lòng kiểm tra kết nối mạng']);
        }
    }

    public function SuaSV($mssv)
    {
        $sinhvien = sinhvien::find($mssv);
        if ($sinhvien != null) {;
            return view('Edit', ['sv' => $sinhvien]);
        }
        else{
            return redirect()->route('Error', 
                ['mes' => 'Cập nhật thất bại', 'reason' => 'Không tìm thấy sinh viên, vui lòng kiểm tra kết nối mạng']);
        }
    }

    public function XuLySuaSV(Request $request)
    {
        sinhvien::CapNhat_SV($request->mssv, $request->hoten, 
            $request->sdt, $request->ngsinh);
        $sinhvien = sinhvien::find($request->mssv);
        if($sinhvien->dangki == 'false')
            return redirect()->route('goAdmin');
        else
            return redirect()->route('XoaThe');
    }

    public function DangKiThe(Request $request)
    {
        try {
            dang_ky_the::Them_The($request->id, $request->mssv);
        } catch (\Exception $e) {
            \Session::put('kq_dki', 'failed_card');
            if (strlen($request->id) > 10) {
                \Session::put('kq_dki', 'invalid_card');
            }
            return redirect()->route('goAdmin');
        }
        
        sinhvien::CapNhat_DangKi($request->mssv);

        $sinhvien = sinhvien::find($request->mssv);
        \Session::put('kq_dki', 'success');
        \Session::put('sv_dki', $sinhvien->hoten);
        return redirect()->route('goAdmin');
    }

    public function XoaThe()
    {
        $danhsachthe = dang_ky_the::paginate(5);
        return view('XoaThe', ['danhsachthe' => $danhsachthe]);
    }

    public function XuLyXoaThe($id, $xoasv)
    {
        $the = dang_ky_the::find($id);
        if($the){
            try {
                $mssv = $the->sinhvien->mssv;
                $the->delete();
                if($xoasv == "true"){
                    MyController::XoaSV($mssv);
                }
                else{
                    sinhvien::CapNhat_DangKi($mssv);
                }
                return redirect()->route('XoaThe');
            } catch (\Exception $e) {
                return redirect()->route('Error', 
                ['mes' => 'Xóa thẻ thất bại', 'reason' => 'Có lỗi trong quá trình xử lý, vui long thử lại']);
            }
        }
        else{
            return redirect()->route('Error', 
                ['mes' => 'Xóa thẻ thất bại', 'reason' => 'Không tìm thấy thẻ, vui lòng kiểm tra kết nối mạng']);
        }
    }

    public function TimKiem(Request $request)
    {
        $TuKhoa = $request->TuKhoa;
        
        $danhsachsv = \DB::table('sinhvien')->where('hoten', 'like', "%$TuKhoa%")
            ->orWhere('sdt', 'like', "%$TuKhoa%")
            ->orWhere('mssv', 'like', "%$TuKhoa%")
            ->orWhere('ngsinh', 'like', "%$TuKhoa%")
            ->paginate(5)->appends(['TuKhoa' => $TuKhoa]);
            
        return view('TimKiem', ['danhsachsv' => $danhsachsv, 'TuKhoa' => $TuKhoa]);
    }

    public function Error($mes, $re)
    {
        return view('Error', ['mes' => $mes, 're' => $re]);
    }
}

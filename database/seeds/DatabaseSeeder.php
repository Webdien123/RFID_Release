<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(SinhVienData::class);
    	$this->call(DangKyTheData::class);
    	$this->call(TaiKhoanData::class);
    }
}

/**
* Lớp tạo dữ liệu cho sinh viên
*/
class SinhVienData extends Seeder
{
	
	public function run()
	{
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300001', 'Nguyễn Văn A', '0919000001', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300002', 'Nguyễn Văn B', '0919000002', '1995-02-01', true]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300003', 'Nguyễn Văn C', '0919000003', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300004', 'Nguyễn Văn D', '0919000004', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300005', 'Nguyễn Văn E', '0919000005', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300006', 'Nguyễn Văn F', '0919000006', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300007', 'Nguyễn Văn G', '0919000007', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300008', 'Nguyễn Văn H', '0919000008', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300009', 'Nguyễn Văn I', '0919000009', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300010', 'Nguyễn Văn J', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300011', 'Nguyễn Văn K', '0919000001', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300012', 'Nguyễn Văn L', '0919000002', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300013', 'Nguyễn Văn M', '0919000003', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300014', 'Nguyễn Văn N', '0919000004', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300015', 'Nguyễn Văn O', '0919000005', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300016', 'Nguyễn Văn P', '0919000006', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300017', 'Nguyễn Văn Q', '0919000007', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300018', 'Nguyễn Văn R', '0919000008', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300019', 'Nguyễn Văn S', '0919000009', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300020', 'Nguyễn Văn T', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300021', 'Nguyễn Văn U', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300022', 'Nguyễn Văn V', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300023', 'Nguyễn Văn W', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300024', 'Nguyễn Văn X', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300025', 'Nguyễn Văn Y', '0919000010', '1995-02-01', false]);
		DB::insert('insert into sinhvien (mssv, hoten, sdt, ngsinh, dangki) values (?, ?, ?, ?, ?)', ['B1300026', 'Nguyễn Văn Z', '0919000010', '1995-02-01', false]);
	}
}

/**
*Lớp tạo dữ liệu các thẻ đã đăng ký
*/
class DangKyTheData extends Seeder
{
	
	public function run()
	{
		DB::insert('insert into dang_ky_the (id, mssv) values (?, ?)', ['0005706269', 'B1300002']);
	}
}

/**
*Lớp tạo dữ liệu tài khoản quản trị viên
*/
class TaiKhoanData extends Seeder
{
	
	public function run()
	{
		DB::insert('insert into taikhoan (uname, pass) values (?, ?)', ['admin', Hash::make("admin")]);
	}
}


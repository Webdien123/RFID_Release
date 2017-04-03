<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MyController@GetViewHome')->name('GetViewHome');

Route::post('login_process', 'MyController@login_process')->name('login_process');

Route::get('trangquantri', 'MyController@goAdmin')->name('goAdmin');

Route::post('Input_card', ['as'=>'Input_card', 'uses'=>'MyController@Res_card']);

Route::get('logout', 'MyController@logout')->name('logout');

Route::post('AddSV', 'MyController@AddSV')->name('AddSV');

Route::get('XoaSV/{mssv}', 'MyController@XoaSV')->name('XoaSV');

Route::get('SuaSV/{mssv}', 'MyController@SuaSV')->name('SuaSV');

Route::post('XuLySuaSV', 'MyController@XuLySuaSV')->name('XuLySuaSV');

Route::post('DangKiThe', 'MyController@DangKiThe')->name('DangKiThe');

Route::get('XoaThe', 'MyController@XoaThe')->name('XoaThe');

Route::get('XuLyXoaThe/{id}/{xoasv}', 'MyController@XuLyXoaThe')->name('XuLyXoaThe');

Route::get('TimKiem', 'MyController@TimKiem')->name('TimKiem');

Route::get('Error/{mes}/{re}', 'MyController@Error')->name('Error');

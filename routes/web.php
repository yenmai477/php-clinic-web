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

//Route::get('/', function () {
//    return view('index.benhnhan.danhsach');
//});


Route::get('dangnhap', 'UserController@getLogin')->name('dangnhap.get');
Route::post('dangnhap', 'UserController@postLogin')->name('dangnhap.post');
Route::post('dangki', 'UserController@create');
//logout
Route::get('dangxuat', 'UserController@getLogout')->name('dangxuat.get');

Route::group(['prefix' => '/', 'middleware' => 'adminLogin'], function () {

  Route::get('/', 'TrangChuController@getTrangChu')->name('trangchu.get');

  //About us
  Route::get('aboutus', function () {
    return view('index.quydinh.aboutus');
  })->name('aboutus.get');

  //Don vi
  Route::group(['prefix' => 'donvi'], function () {
    //danhsach
    Route::get('/', 'DonViController@getDSDonVi')->name('ds-donvi.get');
    //them
    Route::get('them', 'DonViController@getThemDonVi')->name('them-donvi.get');
    Route::post('them', 'DonViController@postThemDonVi')->name('them-donvi.post');
    //sua
    Route::get('sua/{id}', 'DonViController@getSuaDonVi')->name('sua-donvi.get');
    Route::post('sua/{id}', 'DonViController@postSuaDonVi')->name('sua-donvi.post');
    //xoa
    Route::get('xoa/{id}', 'DonViController@getXoaDonVi')->name('xoa-donvi.get');
  });

  //cach dung
  Route::group(['prefix' => 'cachdung'], function () {
    //danhsach
    Route::get('/', 'CachDungController@getDSCachDung')->name('ds-cachdung.get');
    //them
    Route::get('them', 'CachDungController@getThemCachDung')->name('them-cachdung.get');
    Route::post('them', 'CachDungController@postThemCachDung')->name('them-cachdung.post');
    //sua
    Route::get('sua/{id}', 'CachDungController@getSuaCachDung')->name('sua-cachdung.get');
    Route::post('sua/{id}', 'CachDungController@postSuaCachDung')->name('sua-cachdung.post');
    //xoa
    Route::get('xoa/{id}', 'CachDungController@getXoaCachDung')->name('xoa-cachdung.get');
  });

  //Loai benh
  Route::group(['prefix' => 'loaibenh'], function () {
    //danhsach
    Route::get('/', 'LoaiBenhController@getDSLoaiBenh')->name('ds-loaibenh.get');
    //them
    Route::get('them', 'LoaiBenhController@getThemLoaiBenh')->name('them-loaibenh.get');
    Route::post('them', 'LoaiBenhController@postThemLoaiBenh')->name('them-loaibenh.post');
    //sua
    Route::get('sua/{id}', 'LoaiBenhController@getSuaLoaiBenh')->name('sua-loaibenh.get');
    Route::post('sua/{id}', 'LoaiBenhController@postSuaLoaiBenh')->name('sua-loaibenh.post');
    //xoa
    Route::get('xoa/{id}', 'LoaiBenhController@getXoaLoaiBenh')->name('xoa-loaibenh.get');
  });

  //Quy dinh
  Route::get('quydinh', 'QuyDinhController@getQuyDinh')->name('quydinh.get');
  Route::post('quydinh', 'QuyDinhController@postQuyDinh')->name('quydinh.post');

  //Benh nhan
  Route::group(['prefix' => 'benhnhan'], function () {
    //danhsach
    Route::get('/', 'BenhNhanController@getDSBenhNhan')->name('ds-benhnhan.get');
    //them
    Route::get('them', 'BenhNhanController@getThemBenhNhan')->name('them-benhnhan.get');
    Route::post('them', 'BenhNhanController@postThemBenhNhan')->name('them-benhnhan.post');
    //sua
    Route::get('sua/{id}', 'BenhNhanController@getSuaBenhNhan')->name('sua-benhnhan.get');
    Route::post('sua/{id}', 'BenhNhanController@postSuaBenhNhan')->name('sua-benhnhan.post');
    //xoa
    Route::get('xoa/{id}', 'BenhNhanController@getXoaBenhNhan')->name('xoa-benhnhan.get');
    //tra cuu
    Route::get('tracuu', 'BenhNhanController@getTraCuuBenhNhan')->name('tracuu-benhnhan.get');
    Route::get('ajax-tracuu', 'BenhNhanController@getAjaxTraCuuBenhNhan')->name('ajax-tracuu-benhnhan.get');
  });

  Route::group(['prefix' => 'phieukham'], function () {
    //danh sach kham benh trong ngay
    Route::get('danhsachkhambenh', 'PhieuKhamController@getDSKhamBenh')->name('ds-khambenh.get');
    //ajax load danh sach kham benh trong ngay
    Route::get('ajaxds', 'PhieuKhamController@getAjaxDSKhamBenh')->name('ajax-ds-khambenh.get');
    //xuat excel
    Route::get('xuatexcel/{ngay}', 'PhieuKhamController@getXuatExcel')->name('excel-ds-khambenh.get');
    //        danh sach
    Route::get('/', 'PhieuKhamController@getDSPhieuKham')->name('ds-phieukham.get');
    //them
    Route::get('them/{id?}', 'PhieuKhamController@getThemPhieuKham')->name('them-phieukham.get');
    Route::post('them', 'PhieuKhamController@postThemPhieuKham')->name('them-phieukham.post');
    //sua
    Route::get('sua/{id}', 'PhieuKhamController@getSuaPhieuKham')->name('sua-phieukham.get');
    Route::post('sua/{id}', 'PhieuKhamController@postSuaPhieuKham')->name('sua-phieukham.post');
    //xoa
    Route::get('xoa/{id}', 'PhieuKhamController@getXoaPhieuKham')->name('xoa-phieukham.get');
    //chi tiet
    Route::get('chitiet/{id}', 'PhieuKhamController@getCTPhieuKham')->name('ct-phieukham.get');
    //hoadon
    Route::get('hoadon/{id}', 'PhieuKhamController@getHDPhieuKham')->name('hd-phieukham.get');
  });

  //Thuoc
  Route::group(['prefix' => 'thuoc'], function () {
    //danhsach
    Route::get('/', 'ThuocController@getDSThuoc')->name('ds-thuoc.get');
    //them
    Route::get('them', 'ThuocController@getThemThuoc')->name('them-thuoc.get');
    Route::post('them', 'ThuocController@postThemThuoc')->name('them-thuoc.post');
    //sua
    Route::get('sua/{id}', 'ThuocController@getSuaThuoc')->name('sua-thuoc.get');
    Route::post('sua/{id}', 'ThuocController@postSuaThuoc')->name('sua-thuoc.post');
    //xoa
    Route::get('xoa/{id}', 'ThuocController@getXoaThuoc')->name('xoa-thuoc.get');
  });

  //thong tin phong kham
  Route::get('ttpk', 'QuyDinhController@getTTPK')->name('ttpk.get');
  Route::post('ttpk', 'QuyDinhController@postTTPK')->name('ttpk.post');

  //hoa don
  //    Route::group(['prefix' => 'hoadon'], function () {
  //danh sach
  //        Route::get('/', 'HoaDonController@getDSHoaDon')->name('ds-hoadon.get');
  //them
  //        Route::get('them', 'HoaDonController@getThemHoaDon')->name('them-hoadon.get');
  //        Route::post('them', 'HoaDonController@postThemHoaDon')->name('them-hoadon.post');
  //xoa
  // Route::get('xoa/{id}', 'HoaDonController@getXoaHoaDon')->name('xoa-hoadon.get');
  //    });

  //Bao cao doanh thu
  Route::group(['prefix' => 'baocaodoanhthu'], function () {
    //danhsach
    Route::get('/', 'BaoCaoDTController@getDSBaoCaoDT')->name('bcdt.get');
    //ajax
    Route::get('ajax', 'BaoCaoDTController@getAjaxBaoCaoDT')->name('ajax-bcdt.get');
    //cronjob them
    Route::get('cronjobthem', 'BaoCaoDTController@getThemBaoCaoDT')->name('cronjobthem-bcdt.get');
    //cronjob sua
    //        Route::get('cronjobsua', 'BaoCaoDTController@getAjaxBaoCaoDT')->name('cronjobsua-bcdt.get');
  });

  //Bao cao su dung thuoc
  Route::group(['prefix' => 'baocaosudungthuoc'], function () {
    //danhsach
    Route::get('/', 'BaoCaoSDTController@getDSBaoCaoSDT')->name('bcsdt.get');
    //them
    Route::get('ajax', 'BaoCaoSDTController@getAjaxBaoCaoSDT')->name('ajax-bcsdt.get');

    Route::get('cronjob', 'BaoCaoSDTController@getCronjobBaoCaoSDT')->name('cronjob-bcsdt.get');
  });

  Route::group(['prefix' => 'nhapthuoc'], function () {
    //danhsach
    Route::get('/', 'NhapThuocController@getDSPNT')->name('ds-pnt.get');
    //them
    Route::get('them', 'NhapThuocController@getThemPNT')->name('them-pnt.get');

    Route::post('them', 'NhapThuocController@postThemPNT')->name('them-pnt.post');

    Route::get('chitiet/{id}', 'NhapThuocController@getChiTietPNT')->name('chitiet-pnt.get');
  });

  //Edit user
  Route::get('hoso', 'UserController@getHoSo')->name('hoso.get');
  Route::post('hoso', 'UserController@postHoSo')->name('hoso.post');

  Route::get('doimatkhau', 'UserController@getDoiMatKhau')->name('doimatkhau.get');
  Route::post('doimatkhau', 'UserController@postDoiMatKhau')->name('doimatkhau.post');
});

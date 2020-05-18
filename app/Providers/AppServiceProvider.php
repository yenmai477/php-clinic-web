<?php

namespace App\Providers;

use App\Thuoc;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use App\PhieuKhamBenh;
use App\ThamSo;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    //
    $SoBNDaKhamTrongNgay = PhieuKhamBenh::where('NgayKham', date('Y-m-d'))->count();
    $SoBNToiDa = ThamSo::where('ThamSo', 'SoBenhNhanToiDa')->first()->GiaTri;
    if ($SoBNDaKhamTrongNgay - $SoBNToiDa == 0)
      $SoConLai = 0;
    else $SoConLai = $SoBNToiDa - $SoBNDaKhamTrongNgay;

    //Muc canh bao thuoc
    $MucCanhBaoThuoc = ThamSo::where("ThamSo", 'MucCanhBaoThuoc')->first()->GiaTri;
    $CanhBaoThuoc = Thuoc::select('MaThuoc', 'TenThuoc', 'SoLuongConLai', 'MaDonVi')->where("SoLuongConLai", "<=", $MucCanhBaoThuoc)->get();


    // Sharing

    View::share(['SoBNConLai' => $SoConLai, 'CanhBaoThuoc' => $CanhBaoThuoc]);
  }

  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }
}

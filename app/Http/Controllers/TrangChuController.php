<?php

namespace App\Http\Controllers;

use App\BaoCaoDoanhThu;
use App\ChiTietBCDT;
use App\ChiTietBCSDT;
use App\HoaDon;
use App\PhieuKhamBenh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TrangChuController extends Controller
{
  //
  public function getTrangChu()
  {
    $user = Auth::user();
    $thang = date('Y-m');
    $tongBN = PhieuKhamBenh::where('NgayKham', 'like', "$thang%")->get()->groupBy('MaBN')->count();
    $tongPK = PhieuKhamBenh::where('NgayKham', 'like', "$thang%")->count();
    $tongDT = BaoCaoDoanhThu::where('ThangNam', date('m/Y'))->first();
    if ($tongDT) {
      $tongDT = $tongDT->TongDoanhThu;
    } else {
      $tongDT = 0;
    }

    // $tongDT = BaoCaoDoanhThu::where('ThangNam', '06/2018')->first()->TongDoanhThu;
    $pkbTrongThang = PhieuKhamBenh::where('NgayKham', 'like', "$thang%")->get();
    $tongTK = 0;
    foreach ($pkbTrongThang as $detail) {
      $tongTK += $detail->hoadon->TienKham;
    }

    $doanhThu = array();
    for ($i = 1; $i <= 31; $i++) {
      $doanhThu[$i] = 0;
    }
    // kiểm tra cùng tháng hay không
    $isSameMonth = strcmp(date('m/Y'),  date('m/Y', strtotime("-7 days")));
    $BCDT = BaoCaoDoanhThu::where('ThangNam', date('m/Y'))->first();
    $MaBCDT = $BCDT ? $BCDT->MaBCDT : NULL;
    if ($isSameMonth === 0) {
      $CTBCDT = ChiTietBCDT::where('MaBCDT', $MaBCDT)->where('Ngay', '<', date('j'))->where('Ngay', '>=', date('j') - 7)->orderBy('Ngay')->get();
    } else {
      $BCDT_Ago = BaoCaoDoanhThu::where('ThangNam', date('m/Y', strtotime("-7 days")))->first();
      $CTBCDT = ChiTietBCDT::where(function ($q) use ($MaBCDT) {
        $q->where('MaBCDT', $MaBCDT)
          ->where('Ngay', '<', date('j'));
      })->orWhere(function ($query) use ($BCDT_Ago) {
        $query->where('MaBCDT', $BCDT_Ago->MaBCDT)
          ->where('Ngay', '>=', date('d', strtotime("-7 days")));
      })->orderBy('Ngay')->get();
    }


    foreach ($CTBCDT as $i => $detail) {

      if ($detail->Ngay == NULL) {
        $doanhThu[$detail->Ngay] = 0;
      } else {
        if ($detail->Ngay == 1) {
        }
        $doanhThu[$detail->Ngay] = $detail->DoanhThu;
      }
    }
    $TopThuocSoLan = ChiTietBCSDT::where('MaBCSDT', 2)->orderBy('SoLanDung', 'DESC')->offset(0)->limit(3)->get();
    $TopThuocSoLuong = ChiTietBCSDT::where('MaBCSDT', 2)->orderBy('SoLuongDung', 'DESC')->offset(0)->limit(3)->get();
    return view('index.trangchu.trangchu', compact('user', 'tongBN', 'tongPK', 'tongDT', 'tongTK', 'doanhThu', 'TopThuocSoLan', 'TopThuocSoLuong'));
  }
}

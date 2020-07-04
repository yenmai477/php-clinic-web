<?php

namespace App\Http\Controllers;

use App\ChiTietPNT;
use App\PhieuNhapThuoc;
use App\Thuoc;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Validator;

class NhapThuocController extends Controller
{
  //
  public function getDSPNT()
  {
    $dsPNT = PhieuNhapThuoc::all()->sortByDesc('NgayNhap');
    return view('index.nhapthuoc.danhsach', compact('dsPNT'));
  }

  public function getThemPNT()
  {
    $dsThuoc = Thuoc::all();
    return view('index.nhapthuoc.them', compact('dsThuoc'));
  }

  public function postThemPNT(Request $request)
  {
    $dsThuoc = Thuoc::all();
    $messages = [
      'ngaynhap.required' => 'Chưa có ngày nhập thuốc.'
    ];
    $rules = [
      'ngaynhap' => 'required'
    ];
    $errors = Validator::make($request->all(), $rules, $messages);
    if ($errors->fails()) {
      return redirect()
        ->route('them-pnt.get')
        ->withErrors($errors)
        ->withInput();
    }
    foreach ($dsThuoc as $detail) {
      $idThuoc = $detail->MaThuoc;
      $SoLuong = $request->$idThuoc;
      if ($SoLuong < 0) {
        $error = new MessageBag();
        $error->add('err', 'Số lượng thuốc không thể là số âm.');
        return redirect()
          ->route('them-pnt.get')
          ->withErrors($error)
          ->withInput();
      }
    }
    $PhieuNhapThuoc = new PhieuNhapThuoc();
    $PhieuNhapThuoc->NgayNhap = $request->ngaynhap;
    $PhieuNhapThuoc->SoLoaiThuocNhap = 0;
    $PhieuNhapThuoc->TongTienNhap = 0;
    $PhieuNhapThuoc->save();

    $TongTien = 0;
    $DemSoLoaiThuocNhap = 0;
    foreach ($dsThuoc as $detail) {
      $idThuoc = $detail->MaThuoc;
      $idDonGiaThuoc = "dongia" . $detail->MaThuoc;
      $SoLuong = $request->$idThuoc;
      $DonGiaThuoc = $request->$idDonGiaThuoc;
      if ($SoLuong > 0) {
        $CTPNT = new ChiTietPNT();
        $CTPNT->MaPNT = $PhieuNhapThuoc->MaPNT;
        $CTPNT->MaThuoc = $detail->MaThuoc;
        $CTPNT->SoLuongNhap = $SoLuong * 1;
        $CTPNT->DonGiaNhap = $DonGiaThuoc;

        $ThanhTien = $DonGiaThuoc * $SoLuong * 1;

        $CTPNT->ThanhTien = $ThanhTien;
        $TongTien += $ThanhTien;
        $DemSoLoaiThuocNhap += 1;

        $detail->SoLuongConLai = $detail->SoLuongConLai + $SoLuong;
        $detail->save();

        $CTPNT->save();
      }
    }

    $PhieuNhapThuoc->SoLoaiThuocNhap = $DemSoLoaiThuocNhap;
    $PhieuNhapThuoc->TongTienNhap = $TongTien;
    $PhieuNhapThuoc->save();

    return redirect()->route('them-pnt.get')->with('success', 'Nhập thuốc thành công');
  }

  public function getChiTietPNT($id)
  {
    $errors = new MessageBag();
    $PNT = PhieuNhapThuoc::find($id);
    if (!$PNT) {
      $errors->add('err', 'Phiếu nhập thuốc không tồn tại.');
      return redirect()->route('ds-pnt.get')->withErrors($errors);
    }

    return view('index.nhapthuoc.chitiet', compact('PNT'));
  }
}

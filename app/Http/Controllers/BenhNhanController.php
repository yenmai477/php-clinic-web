<?php

namespace App\Http\Controllers;

use App\BenhNhan;
use App\LoaiBenh;
use App\PhieuKhamBenh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class BenhNhanController extends Controller
{
  //
  public function getDSBenhNhan()
  {
    $dsBenhNhan = BenhNhan::all();
    return view('index.benhnhan.danhsach', compact('dsBenhNhan'));
  }

  public function getThemBenhNhan()
  {
    return view('index.benhnhan.them');
  }

  public function postThemBenhNhan(Request $request)
  {
    $messages = [
      'hoten.required' => 'Chưa nhập họ & tên.',
      'hoten.min' => 'Họ & tên quá ngắn.',
      'hoten.max' => 'Họ & tên quá dài.',
      'gioitinh.required' => 'Chưa chọn giới tính.',
      'namsinh.required' => 'Chưa chọn năm sinh.',
      'namsinh.numeric' => 'Năm sinh phải là số.',
      'diachi.required' => 'Chưa nhập địa chỉ.',
      'diachi.min' => 'Địa chỉ quá ngắn.',
      'diachi.max' => 'Địa chỉ quá dài.',
    ];
    $rules = [
      'hoten' => 'required|min:5|max:50',
      'gioitinh' => 'required|numeric',
      'namsinh' => 'required|numeric',
      'diachi' => 'required|min:5|max:50',
    ];
    $errors = Validator::make($request->all(), $rules, $messages);
    if ($errors->fails()) {
      return redirect()
        ->route('them-benhnhan.get')
        ->withErrors($errors)
        ->withInput();
    }
    $BenhNhan = new BenhNhan();
    $BenhNhan->HoTen =  $request->hoten;
    $BenhNhan->NamSinh = $request->namsinh;
    $BenhNhan->GioiTinh = $request->gioitinh;
    $BenhNhan->DiaChi = $request->diachi;
    $BenhNhan->save();
    return redirect()->route('them-benhnhan.get')->with('success', "Thêm bệnh nhân thành công.<br/><a href='" . route('them-phieukham.get', [$BenhNhan->MaBN]) . "'>Thêm phiếu khám bệnh cho bệnh nhân này</a>");
  }

  public function getSuaBenhNhan($id)
  {
    $errors = new MessageBag();
    $DemSoBenhNhan = BenhNhan::where('MaBN', $id)->count();
    if ($DemSoBenhNhan == 0) {
      $errors->add('err', 'Bệnh nhân không tồn tại.');
      return redirect()->route('ds-benhnhan.get')->withErrors($errors);
    } else {
      $BenhNhan = BenhNhan::find($id);
      return view('index.benhnhan.sua', compact('BenhNhan'));
    }
  }

  public function postSuaBenhNhan(Request $request, $id)
  {
    $errors = new MessageBag();
    $DemSobenhnhan = BenhNhan::where('MaBN', $id)->count();
    if ($DemSobenhnhan == 0) {
      $errors->add('err', 'Bệnh nhân không tồn tại.');
      return redirect()->route('ds-benhnhan.get')->withErrors($errors);
    } else {
      $messages = [
        'hoten.required' => 'Chưa nhập họ & tên.',
        'hoten.min' => 'Họ & tên quá ngắn.',
        'hoten.max' => 'Họ & tên quá dài.',
        'gioitinh.required' => 'Chưa chọn giới tính.',
        'namsinh.required' => 'Chưa chọn năm sinh.',
        'namsinh.numeric' => 'Năm sinh phải là số.',
        'diachi.required' => 'Chưa nhập địa chỉ.',
        'diachi.min' => 'Địa chỉ quá ngắn.',
        'diachi.max' => 'Địa chỉ quá dài.',
      ];
      $rules = [
        'hoten' => 'required|min:5|max:50',
        'gioitinh' => 'required|numeric',
        'namsinh' => 'required|numeric',
        'diachi' => 'required|min:5|max:50',
      ];
      $errors = Validator::make($request->all(), $rules, $messages);
      if ($errors->fails()) {
        return redirect()
          ->route('sua-benhnhan.get', [$id])
          ->withErrors($errors)
          ->withInput();
      }
      $BenhNhan = BenhNhan::find($id);
      $BenhNhan->HoTen =  $request->hoten;
      $BenhNhan->NamSinh = $request->namsinh;
      $BenhNhan->GioiTinh = $request->gioitinh;
      $BenhNhan->DiaChi = $request->diachi;
      $BenhNhan->save();
      return redirect()->route('sua-benhnhan.get', [$id])->with('success', 'Sửa bệnh nhân thành công.');
    }
  }

  public function getXoaBenhNhan($id)
  {
    $errors = new MessageBag();
    $DemSobenhnhan = BenhNhan::where('MaBN', $id)->count();
    if ($DemSobenhnhan == 0) {
      $errors->add('err', 'Bệnh nhân không tồn tại.');
      return redirect()->route('ds-benhnhan.get')->withErrors($errors);
    } else {
      $DemSoPKBDaDung = PhieuKhamBenh::where('MaBN', $id)->count();
      if ($DemSoPKBDaDung > 0) {
        $errors->add('err', 'Không thể xóa bệnh nhân này.');
        return redirect()->route('ds-benhnhan.get')->withErrors($errors);
      } else {
        $BenhNhan = BenhNhan::find($id);
        $BenhNhan->delete();
        return redirect()->route('ds-benhnhan.get')->with('success', 'Xóa thành công.');
      }
    }
  }

  public function getTraCuuBenhNhan()
  {
    $dsLoaiBenh = LoaiBenh::all();
    return view('index.benhnhan.tracuu', compact('dsLoaiBenh'));
  }

  public function getAjaxTraCuuBenhNhan(Request $request)
  {
    if ($request->ajax()) {
      $HoTen = "";
      $Ngay = "";
      $TrieuChung = "";
      $LoaiBenh = "";

      if ($request->hoten != "")
        $HoTen = $request->hoten;
      if ($request->ngay != "")
        $Ngay = $request->ngay;
      if ($request->trieuchung != "")
        $TrieuChung = $request->trieuchung;
      if ($request->loaibenh != "")
        $LoaiBenh = $request->loaibenh;

      $dsBenhNhan = PhieuKhamBenh::whereHas('benhnhan', function ($query) use ($HoTen) {
        $query->where('HoTen', 'like', '%' . $HoTen . '%');
      })->where('TrieuChung', 'like', '%' . $TrieuChung . '%')
        ->where('NgayKham', 'like', '%' . $Ngay . '%')
        ->where('MaLoaiBenh', 'like', '%' . $LoaiBenh . '%')
        ->get();

      if (count($dsBenhNhan) == 0)
        echo "<tr><td colspan='6'>Không tìm thấy bệnh nhân</td></tr>";
      else {
        $i = 0;
        sleep(2);

        foreach ($dsBenhNhan as $detail) {
          //                    $mang_kiemtra[$i] = $detail->MaPKB;
          echo "<tr>";
          echo "<td>" . ++$i . "</td>";
          echo "<td>" . $detail->benhnhan->HoTen . "</td>";
          echo "<td>" . date_format(date_create($detail->NgayKham), 'd/m/Y') . "</td>";
          echo "<td>" . $detail->loaibenh->TenLoaiBenh . "</td>";
          echo "<td>" . $detail->TrieuChung . "</td>";
          echo "<td class='d-print-none'>
                                <a href=\"" . route('them-phieukham.get', [$detail->MaBN]) . "\"
                                   class=\"btn btn-icon waves-effect waves-light btn-success\" title=\"Thêm phiếu khám bệnh cho bệnh nhân này\"> Thêm PKB</a>
                                &nbsp;            
                                <a href=\"" . route('sua-phieukham.get', [$detail->MaPKB]) . "\"
                                   class=\"btn btn-icon waves-effect waves-light btn-warning\" title=\"Sửa\"> <i
                                            class=\"fa fa-wrench\"></i></a>
                                &nbsp;
                                &nbsp;
                                <a onclick=\"del($detail->MaPKB)\"
                                   class=\"btn btn-icon waves-effect waves-light btn-danger\" title=\"Xóa\"> <i
                                   class='fas fa-trash-alt' style='color:white'></i></a></td>";
          echo "</tr>";
        }
        if ($i == 0) {
          echo "<tr><td colspan='6'>Không tìm thấy bệnh nhân</td></tr>";
        }
      }
    }
  }
}

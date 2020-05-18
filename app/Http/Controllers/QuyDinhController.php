<?php

namespace App\Http\Controllers;

use App\ThamSo;
use App\ThongTinPhongKham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuyDinhController extends Controller
{
    //
    public function getQuyDinh()
    {
        $SoBNToiDa = ThamSo::where('ThamSo','SoBenhNhanToiDa')->first();
        $TienKham = ThamSo::where('ThamSo','TienKham')->first();
        $MucCanhBaoThuoc = ThamSo::where('ThamSo','MucCanhBaoThuoc')->first();
        return view('index.quydinh.quydinh',compact('SoBNToiDa','TienKham', 'MucCanhBaoThuoc'));
    }

    public function postQuyDinh(Request $request)
    {
        $messages = [
            'sobntoida.required' => 'Chưa nhập số bệnh nhân tối đa.',
            'sobntoida.integer' => 'Số bệnh nhân phải là số',
            'sobntoida.min' => 'Số bệnh nhân tối đa không được âm',
            'tienkham.require' => 'Chưa nhập tiền khám.',
            'tienkham.integer' => 'Tiền khám phải là số.',
            'tienkham.min' => 'Tiền khám không được âm.',
            'muccanhbaothuoc.require' => 'Chưa nhập mức cảnh báo hết thuốc.',
            'muccanhbaothuoc.integer' => 'Mức cảnh báo hết thuốc phải là số.',
            'muccanhbaothuoc.min' => 'Mức cảnh báo hết thuốc không được âm.',
        ];
        $rules = [
            'sobntoida' => 'required|integer|min:0',
            'tienkham' => 'required|integer|min:0',
            'muccanhbaothuoc' => 'required|integer|min:0'
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('quydinh.get')
                ->withErrors($errors)
                ->withInput();
        }
        $SoBNToiDa = ThamSo::where('ThamSo','SoBenhNhanToiDa')->first();
        $TienKham = ThamSo::where('ThamSo','TienKham')->first();
        $MucCanhBaoThuoc = ThamSo::where('ThamSo','MucCanhBaoThuoc')->first();

        $SoBNToiDa->GiaTri = $request->sobntoida;
        $TienKham->GiaTri = $request->tienkham;
        $MucCanhBaoThuoc->GiaTri = $request->muccanhbaothuoc;

        $SoBNToiDa->save();
        $TienKham->save();
        $MucCanhBaoThuoc->save();

        return redirect()->route('quydinh.get')->with('success','Sửa quy định thành công');

    }

    //thong tin phong kham
    public function getTTPK()
    {
        $TenPK = ThongTinPhongKham::find(1);
        $TenBS = ThongTinPhongKham::find(2);
        $DiaChi = ThongTinPhongKham::find(3);
        $SDT = ThongTinPhongKham::find(4);
        return view('index.quydinh.thongtin',compact('TenPK','TenBS','DiaChi','SDT'));
    }

    public function postTTPK(Request $request)
    {
        $messages = [
            'tenpk.max' => 'Tên phòng khám quá dài.',
            'tenbs.max' => 'Tên bác sĩ quá dài.',
            'diachi.max' => 'Địa chỉ quá dài.',
            'sdt.max' => 'Số điện thoại không tồn tại.',
        ];
        $rules = [
            'tenpk' => 'nullable|max:50',
            'tenbs' => 'nullable|max:50',
            'diachi' => 'nullable|max:50',
            'sdt' => 'nullable|max:11',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ttpk.get')
                ->withErrors($errors)
                ->withInput();
        }
        $TenPK = ThongTinPhongKham::find(1);
        $TenBS = ThongTinPhongKham::find(2);
        $DiaChi = ThongTinPhongKham::find(3);
        $SDT = ThongTinPhongKham::find(4);

        $TenPK->GiaTri = $request->tenpk;
        $TenBS->GiaTri = $request->tenbs;
        $DiaChi->GiaTri = $request->diachi;
        $SDT->GiaTri = $request->sdt;

        $TenPK->save();
        $TenBS->save();
        $DiaChi->save();
        $SDT->save();

        return redirect()->route('ttpk.get')->with('success','Sửa thông tin phòng khám thành công');
    }
}

<?php

namespace App\Http\Controllers;

use App\CachDung;
use App\ChiTietBCSDT;
use App\ChiTietPKB;
use App\DonVi;
use App\Thuoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;

class ThuocController extends Controller
{
    //
    public function getDSThuoc()
    {
        $dsThuoc = Thuoc::all();
        return view('index.thuoc.danhsach', compact('dsThuoc'));
    }

    public function getThemThuoc()
    {
        $dsDonVi = DonVi::all();
        $dsCachDung = CachDung::all();
        return view("index.thuoc.them", compact('dsDonVi','dsCachDung'));
    }

    public function postThemThuoc(Request $request)
    {
        $messages = [
            'tenthuoc.required' => 'Chưa nhập tên thuốc.',
            'tenthuoc.min' => 'Tên thuốc quá ngắn.',
            'tenthuoc.max' => 'Tên thuốc quá dài.',
            'tenthuoc.unique' => 'Tên thuốc đã tồn tại.',
            'soluongnhap.integer' => 'Số lượng thuốc nhập vào phải là số.',
            'soluongnhap.min' => 'Số lượng thuốc nhập vào không được âm.',
            'dongia.required' => 'Chưa nhập đơn giá.',
            'dongia.integer' => 'Đơn giá phải là số.',
            'dongia.min' => 'Đơn giá không được âm.',
            'donvi.required' => 'Chưa chọn đơn vị.',
            'donvi.numeric' => 'Đơn vị không tồn tại.',
            'cachdung.required' => 'Chưa chọn cách dùng.',
            'cachdung.numeric' => 'Cách dùng không tồn tại.',
        ];
        $rules = [
            'tenthuoc' => 'required|min:5|max:50|unique:thuoc,TenThuoc',
            'soluongnhap' => 'nullable|integer|min:0',
            'dongia' => 'required|integer|min:0',
            'donvi' => 'required|numeric',
            'cachdung' => 'required|numeric',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('them-thuoc.get')
                ->withErrors($errors)
                ->withInput();
        }
        $Thuoc = new Thuoc();
        $Thuoc->TenThuoc = $request->tenthuoc;
        $Thuoc->SoLuongConLai = $request->soluongnhap;
        $Thuoc->DonGia = $request->dongia;
        $Thuoc->MaDonVi = $request->donvi;
        $Thuoc->MaCachDung = $request->cachdung;
        $Thuoc->save();
        return redirect()->route('them-thuoc.get')->with('success','Thêm thuốc mới thành công.');
    }

    public function getSuaThuoc($id)
    {
        $errors = new MessageBag();
        $DemThuoc = Thuoc::where('MaThuoc', $id)->count();
        if ($DemThuoc == 0) {
            $errors->add('err', 'Thuốc này không tồn tại.');
            return redirect()->route('ds-thuoc.get')->withErrors($errors);
        }
        else {
            $dsDonVi = DonVi::all();
            $dsCachDung = CachDung::all();
            $Thuoc = Thuoc::find($id);
            return view('index.thuoc.sua', compact('dsDonVi','dsCachDung','Thuoc'));
        }
    }

    public function postSuaThuoc(Request $request, $id)
    {
        $errors = new MessageBag();
        $DemThuoc = Thuoc::where('MaThuoc', $id)->count();
        if ($DemThuoc == 0) {
            $errors->add('err', 'Thuốc này không tồn tại.');
            return redirect()->route('ds-thuoc.get')->withErrors($errors);
        }
        else {
            $Thuoc = Thuoc::find($id);
            $messages = [
                'tenthuoc.required' => 'Chưa nhập tên thuốc.',
                'tenthuoc.min' => 'Tên thuốc quá ngắn.',
                'tenthuoc.max' => 'Tên thuốc quá dài.',
                'tenthuoc.unique' => 'Tên thuốc đã tồn tại.',
                'soluongnhap.integer' => 'Số lượng thuốc nhập vào phải là số.',
                'soluongnhap.min' => 'Số lượng thuốc nhập vào không được âm.',
                'dongia.required' => 'Chưa nhập đơn giá.',
                'dongia.integer' => 'Đơn giá phải là số.',
                'dongia.min' => 'Đơn giá không được âm.',
                'donvi.required' => 'Chưa chọn đơn vị.',
                'donvi.numeric' => 'Đơn vị không tồn tại.',
                'cachdung.required' => 'Chưa chọn cách dùng.',
                'cachdung.numeric' => 'Cách dùng không tồn tại.',
            ];
            $rules = [
                'tenthuoc' => [
                    'required',
                    'min:5',
                    'max:50',
                    Rule::unique('thuoc','TenThuoc')->ignore($id,'MaThuoc')
                    ],
                'soluongnhap' => 'nullable|integer|min:0',
                'dongia' => 'required|integer|min:0',
                'donvi' => 'required|numeric',
                'cachdung' => 'required|numeric',
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()
                    ->route('sua-thuoc.get',[$id])
                    ->withErrors($errors)
                    ->withInput();
            }
            $Thuoc->TenThuoc = $request->tenthuoc;
            $Thuoc->DonGia = $request->dongia;
            $Thuoc->MaDonVi = $request->donvi;
            $Thuoc->MaCachDung = $request->cachdung;
            $Thuoc->save();
            return redirect()->route('sua-thuoc.get',[$id])->with('success','Sửa thuốc thành công.');
        }
    }

    public function getXoaThuoc($id)
    {
        $errors = new MessageBag();
        $DemThuoc = Thuoc::where('MaThuoc', $id)->count();
        if ($DemThuoc == 0) {
            $errors->add('err', 'Thuốc này không tồn tại.');
            return redirect()->route('ds-thuoc.get')->withErrors($errors);
        }
        else {
            $DemThuocDaDung = ChiTietPKB::where('MaThuoc',$id)->count() + ChiTietBCSDT::where('MaThuoc',$id)->count();
            if ($DemThuocDaDung != 0) {
                $errors->add('err', 'Không thể xóa thuốc này.');
                return redirect()->route('ds-thuoc.get')->withErrors($errors);
            }
            $Thuoc = Thuoc::find($id);
            $Thuoc->delete();
            return redirect()->route('ds-thuoc.get')->with('success','Xóa thành công.');
        }
    }
}

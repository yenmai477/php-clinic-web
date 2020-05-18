<?php

namespace App\Http\Controllers;

use App\PhieuKhamBenh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\LoaiBenh;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;

class LoaiBenhController extends Controller
{
    //
    public function getDSLoaiBenh()
    {
        $dsLoaiBenh = LoaiBenh::all()->sortByDesc('created_at');
        return view('index.loaibenh.danhsach', compact('dsLoaiBenh'));
    }

    public function getThemLoaiBenh()
    {
        return redirect()->route('ds-loaibenh.get');
    }

    public function postThemLoaiBenh(Request $request)
    {
        $messages = [
            'tenloaibenh.required' => 'Chưa nhập loại bệnh.',
            'tenloaibenh.between' => 'Loại bệnh phải từ :min đến :max kí tự.',
            'tenloaibenh.unique' => 'Loại bệnh này đã có vui lòng xem lại.',
        ];
        $rules = [
            'tenloaibenh' => 'required|between:2,20|unique:loaibenh,TenLoaiBenh',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ds-loaibenh.get')
                ->withErrors($errors)
                ->withInput();
        }
        $LoaiBenh = new LoaiBenh();
        $LoaiBenh->TenLoaiBenh = $request->tenloaibenh;
        $LoaiBenh->save();
        return redirect()->route('ds-loaibenh.get')->with('success','Thêm loại bệnh thành công.');
    }

    public function getSuaLoaiBenh($id)
    {
        $errors = new MessageBag();
        $DemLoaiBenh = LoaiBenh::where('MaLoaiBenh', $id)->count();
        if ($DemLoaiBenh < 1) {
            $errors->add('err', 'Loại bệnh này không tồn tại.');
            return redirect()->route('ds-loaibenh.get')->withErrors($errors);
        }
        else {
            $LoaiBenh = LoaiBenh::find($id);
            return view('index.loaibenh.sua', compact('LoaiBenh'));
        }
    }

    public function postSuaLoaiBenh(Request $request,$id)
    {
        $errors = new MessageBag();
        $DemLoaiBenh = LoaiBenh::where('MaLoaiBenh', $id)->count();
        if ($DemLoaiBenh < 1) {
            $errors->add('err', 'Loại bệnh này không tồn tại.');
            return redirect()->route('ds-loaibenh.get')->withErrors($errors);
        }
        else {
            $LoaiBenh = LoaiBenh::find($id);
            $messages = [
                'tenloaibenh.required' => 'Chưa nhập loại bệnh.',
                'tenloaibenh.between' => 'Loại bệnh phải từ :min đến :max kí tự.',
                'tenloaibenh.unique' => 'Loại bệnh này đã có vui lòng xem lại.',
            ];
            $rules = [
                'tenloaibenh' => [
                    'required',
                    'between:2,20',
                    Rule::unique('loaibenh','TenLoaiBenh')->ignore($id,'MaLoaiBenh')
                ]
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()
                    ->route('sua-loaibenh.get',[$id])
                    ->withErrors($errors)
                    ->withInput();
            }
            $LoaiBenh->TenLoaiBenh = $request->tenloaibenh;
            $LoaiBenh->save();
            return redirect()->route('sua-loaibenh.get',[$id])->with('success','Sửa loại bệnh thành công.');
        }
    }

    public function getXoaLoaiBenh($id)
    {
        $errors = new MessageBag();
        $DemLoaiBenh = LoaiBenh::where('MaLoaiBenh', $id)->count();
        if ($DemLoaiBenh == 0) {
            $errors->add('err', 'Loại bệnh này không tồn tại.');
            return redirect()->route('ds-loaibenh.get')->withErrors($errors);
        }
        else {
            $DemLoaiBenhDaDung = PhieuKhamBenh::where('DuDoanLoaiBenh',$id)->count();
            if ($DemLoaiBenhDaDung != 0) {
                $errors->add('err', 'Không thể xóa loại bệnh này.');
                return redirect()->route('ds-loaibenh.get')->withErrors($errors);
            }
            $LoaiBenh = LoaiBenh::find($id);
            $LoaiBenh->delete();
            return redirect()->route('ds-loaibenh.get')->with('success','Xóa thành công.');
        }
    }
}

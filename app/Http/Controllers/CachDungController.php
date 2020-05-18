<?php

namespace App\Http\Controllers;

use App\CachDung;
use App\Thuoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;

class CachDungController extends Controller
{
    //
    public function getDSCachDung()
    {
        $dsCachDung = CachDung::all()->sortByDesc('created_at');
        return view('index.cachdung.danhsach', compact('dsCachDung'));
    }

    public function getThemCachDung()
    {
        return redirect()->route('ds-cachdung.get');
    }

    public function postThemCachDung(Request $request)
    {
        $messages = [
            'cachdung.required' => 'Chưa nhập cách dùng.',
            'cachdung.between' => 'Cách dùng phải từ :min đến :max kí tự.',
            'cachdung.unique' => 'Cách dùng này đã có vui lòng xem lại.',
        ];
        $rules = [
            'cachdung' => 'required|between:3,20|unique:cachdung,CachDung',
        ];
        $errors = Validator::make($request->all(), $rules, $messages);
        if ($errors->fails()) {
            return redirect()
                ->route('ds-cachdung.get')
                ->withErrors($errors)
                ->withInput();
        }
        $CachDung = new CachDung();
        $CachDung->CachDung = $request->cachdung;
        $CachDung->save();
        return redirect()->route('ds-cachdung.get')->with('success','Thêm cách dùng thành công.');
    }

    public function getSuaCachDung($id)
    {
        $errors = new MessageBag();
        $DemCachDung = CachDung::where('MaCachDung', $id)->count();
        if ($DemCachDung < 1) {
            $errors->add('err', 'Cách dùng này không tồn tại.');
            return redirect()->route('ds-cachdung.get')->withErrors($errors);
        }
        else {
            $CachDung = CachDung::find($id);
            return view('index.cachdung.sua', compact('CachDung'));
        }
    }

    public function postSuaCachDung(Request $request,$id)
    {
        $errors = new MessageBag();
        $DemCachDung = CachDung::where('MaCachDung', $id)->count();
        if ($DemCachDung < 1) {
            $errors->add('err', 'Cách dùng này không tồn tại.');
            return redirect()->route('ds-cachdung.get')->withErrors($errors);
        }
        else {
            $CachDung = CachDung::find($id);
            $messages = [
                'cachdung.required' => 'Chưa nhập cách dùng.',
                'cachdung.between' => 'Cách dùng phải từ :min đến :max kí tự.',
                'cachdung.unique' => 'Cách dùng này đã có vui lòng xem lại.',
            ];
            $rules = [
                'cachdung' => [
                    'required',
                    'between:3,20',
                    Rule::unique('cachdung','CachDung')->ignore($id,'MaCachDung')
                    ]
            ];
            $errors = Validator::make($request->all(), $rules, $messages);
            if ($errors->fails()) {
                return redirect()
                    ->route('sua-cachdung.get',[$id])
                    ->withErrors($errors)
                    ->withInput();
            }
            $CachDung->CachDung = $request->cachdung;
            $CachDung->save();
            return redirect()->route('sua-cachdung.get',[$id])->with('success','Sửa cách dùng thành công.');
        }
    }

    public function getXoaCachDung($id)
    {
        $errors = new MessageBag();
        $DemCachDung = CachDung::where('MaCachDung', $id)->count();
        if ($DemCachDung == 0) {
            $errors->add('err', 'Cách dùng này không tồn tại.');
            return redirect()->route('ds-cachdung.get')->withErrors($errors);
        }
        else {
            $DemCachDungDaDung = Thuoc::where('MaCachDung',$id)->count();
            if ($DemCachDungDaDung != 0) {
                $errors->add('err', 'Không thể xóa cách dùng này.');
                return redirect()->route('ds-cachdung.get')->withErrors($errors);
            }
            $CachDung = CachDung::find($id);
            $CachDung->delete();
            return redirect()->route('ds-cachdung.get')->with('success','Xóa thành công.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  //
  public function getLogin()
  {
    if (isset(Auth::user()->id))
      return redirect()->route('trangchu.get');
    return view('index.auth.login');
  }

  public function postLogin(Request $request)
  {
    $this->validate(
      $request,
      [
        'email' => 'required',
        'password' => 'required',
      ],
      [
        'email.required' => 'Bạn chưa nhập Email',
        'password.required' => 'Bạn chưa nhập Mật khẩu',
      ]
    );
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
      return redirect()->route('trangchu.get')->with('success', 'Đăng nhập thành công');
    } else {
      return redirect()->route('dangnhap.get')->with('error', 'Sai Username hoặc password');
    }
  }

  public function getLogout()
  {
    Auth::logout();
    return redirect()->route('dangnhap.get');
  }

  public function getHoSo()
  {
    if (Auth::user()->id == 1); {
      $user = Auth::user();
      return view('index.user.hoso', ['user' => $user]);
    }
    return redirect()->route('dangnhap.get');
  }

  public function postHoSo(Request $request)
  {
    if (Auth::user()->id == 1); {
      $user = Auth::user();
      $messages = [
        'hoten.between' => 'Họ và tên phải từ :min đến :max kí tự.',
      ];
      $rules = [
        'hoten' => 'nullable|between:3,255',
      ];
      $errors = Validator::make($request->all(), $rules, $messages);
      if ($errors->fails()) {
        return redirect()
          ->route('hoso.get')
          ->withErrors($errors)
          ->withInput();
      }
      $user->name = $request->hoten;
      $user->save();
      return redirect()->route('hoso.get')->with('success', 'Sửa thành công.');
    }
    return redirect()->route('dangnhap.get');
  }

  public function getDoiMatKhau()
  {
    return view('index.user.doimatkhau');
  }

  public function postDoiMatKhau(Request $request)
  {
    $user = Auth::user();
    $messages = [
      'passold.required' => 'Chưa nhập mật khẩu cũ.',
      'passnew.required' => 'Chưa nhập mật khẩu mới.',
      'passnew.between' => 'Mật khẩu phải có từ :min đến :max kí tự.',
      're-passnew.same' => 'Mật khẩu nhập lại không khớp.',
    ];
    $rules = [
      'passold' => 'required',
      'passnew' => 'required|between:8,32',
      're-passnew' => 'same:passnew'
    ];
    $errors = Validator::make($request->all(), $rules, $messages);
    if ($errors->fails()) {
      return redirect('doimatkhau')
        ->withErrors($errors)
        ->withInput();
    }
    $pass = $user->getAuthPassword();
    if (Hash::check($request->passold, $pass)) {
      $user->password = Hash::make($request->passnew);
      $user->save();
      return redirect()->route('doimatkhau.get')->with('success', 'Đổi mật khẩu thành công.');
    } else {
      return redirect()->route('doimatkhau.get')->with('error', 'Không thể đổi mật khẩu.');
    }
  }

  public function create(Request $request)
  {

    // return "Hello";
    return User::create([
      'email' => $request->email,
      'password' => bcrypt($request->password),
      'name' => $request->name
    ]);
  }
}

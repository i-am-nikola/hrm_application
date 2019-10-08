<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
  public function index()
  {
    if (Auth::check()) {
      return redirect()->route('dashboard.index');
    }
    return view('admin.login.index');
  }

  public function authenticate(LoginRequest $request)
  {
    $remember = $request->has('remember') ? true : false;
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
      return redirect()->route('dashboard.index')
        ->with(['flash_level' => 'success', 'flash_message' => t('login.success')]);
    } else {
      return redirect()->back()
        ->with(['flash_level' => 'error', 'flash_message' => t('login.error')]);
    }
  }

  public function logout()
  {
    Auth::logout();
    return redirect()->route('login');
  }
}

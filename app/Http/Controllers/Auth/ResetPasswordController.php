<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
  use ResetsPasswords;

  protected $redirectTo = 'admin/dashboard';

  protected function rules()
  {
    return [
      'token'    => 'required',
      'email'    => 'required|email',
      'password' => 'required|confirmed',
    ];
  }

  protected function validationErrorMessages()
  {
    return [
      'email.required'     => t('password.email') . ' ' . t('validate.required'),
      'email.email'        => t('password.email') . ' ' . t('validate.invalid'),
      'password.required'  => t('password.new') . ' ' . t('validate.required'),
      'password.confirmed' => t('password.confirm') . ' ' . t('validate.confirm')
    ];
  }

  protected function sendResetResponse(Request $request, $response)
  {
    Auth::logout();
    return view('auth.passwords.reset_success');
  }

  protected function sendResetFailedResponse(Request $request, $response)
  {
    return redirect()->back()
      ->withInput($request->only('email'))
      ->withErrors(['email' => t('password.incorrect')]);
  }
}

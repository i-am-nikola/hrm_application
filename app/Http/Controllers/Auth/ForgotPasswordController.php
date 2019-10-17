<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
  use SendsPasswordResetEmails;

  protected function validateEmail(Request $request)
  {
    $emailRequest = new EmailRequest;
    $this->validate(
      $request,
      $emailRequest->rules(),
      $emailRequest->messages()
    );
  }

  protected function sendResetLinkResponse()
  {
    return back()->with([
      'flash_level'   => 'success',
      'flash_message' => t('password.email_success')
    ]);
  }

  protected function sendResetLinkFailedResponse(Request $request, $response)
  {
    return back()
      ->withInput($request->only('email'))
      ->withErrors(['email' => t('password.exists')]);
  }
}

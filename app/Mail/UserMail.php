<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserMail extends Mailable
{
  use Queueable, SerializesModels;

  protected $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function build()
  {
    return $this->from('hongdung6992@gmail.com')
      ->subject('Account info')
      ->view('admin.users.mail')
      ->with('data', $this->data);
  }
}

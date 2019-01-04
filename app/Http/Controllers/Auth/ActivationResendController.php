<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Auth\ActivateResendRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\Auth\UserRequestedActivationEmail;

class ActivationResendController extends Controller
{
  public function index ()
  {
    return view('auth.activation.resend.index');
  }
  public function store (ActivateResendRequest $request)
  {
    $user = User::where('email', $request->email)->first();
    if (optional($user)->hasNotActivated()){
      //send activation email
      event(new UserRequestedActivationEmail($user));
    }

    return redirect()->route('login')->withSuccess('An activation email has been sent.');
  }
}

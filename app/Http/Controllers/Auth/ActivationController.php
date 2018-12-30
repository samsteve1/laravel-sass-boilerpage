<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ConfirmationToken;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
  protected $redirectTo = '/dashboard';
    public function activate(ConfirmationToken $token, Request $request)
    {
      //Activate user's acccount
      $token->user->update([
        'activated' => true,
        'email_verified_at' => $token->user->freshTimestamp()
      ]);
      // delete the token after successful account activation
      $token->delete();
      //attempt logging in user using their ID
      Auth::loginUsingId($token->user->id);

      return redirect()->intended($this->redirectPath())->withSuccess('You are now signed in.');
    }

    protected function redirectPath()
    {
      return $this->redirectTo;
    }
}

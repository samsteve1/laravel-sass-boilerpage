<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\DeactivateAccountRequest;

use App\Models\User;
class DeactivateController extends Controller
{
  public function index()
  {
    return view('account.deactivate.index');
  }
  public function store (DeactivateAccountRequest $request)
  {
    $user = $request->user();

    if ($user->subscribed('main')) {
      $user->subscription('main')->cancel();
    }

    $user->delete();

    return redirect('/')->withSuccess('Your account has been deactivated.');
  }
}

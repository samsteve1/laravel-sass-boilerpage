<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Requests\TwoFactor\TwoFactorStoreRequest;
use App\Http\Requests\TwoFactor\TwoFactorVerifyRequest;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\TwoFactor\TwoFactor;

class TwoFactorController extends Controller
{
    public function index()
    {
      $countries = Country::get()->sortBy('name');
      return view('account.twofactor.index', compact('countries'));
    }
    public function store(TwoFactorStoreRequest $request, TwoFactor $twofactor)
    {
      $user = $request->user();

      $user->twoFactor()->create([
        'phone' => $request->phone_number,
        'dial_code' => $request->dial_code,
      ]);

      if($response = $twofactor->register($user)) {
        $user->twoFactor()->update([
          'identifier' => $response->user->id
        ]);
      }
      return back();

    }

    public function verify(TwoFactorVerifyRequest $request)
    {
      $request->user()->twoFactor()->update([
        'verified' => true
      ]);
      return back();
    }
    public function destroy(Request $request, TwoFactor $twofactor)
    {
      $user = $request->user();

      if($twofactor->delete($user)) {
        $user->twoFactor()->delete();
      }
      return back();
    }
}

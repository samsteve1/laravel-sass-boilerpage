<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\ProfileStoreRequest;
use App\Models\TwoFactor;

class ProfileController extends Controller
{
  public function index()
  {
    return view('account.profile.index');
  }
  public function store(ProfileStoreRequest $request)
  {
    $request->user()->update($request->only('name', 'email'));
    return back()->withSuccess('Profile updated!');
  }
}

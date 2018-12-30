<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordStoreRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Account\PassswordUpdated;


class PasswordController extends Controller
{
    public function index()
    {
      return view('account.password.index');
    }
    public function store(PasswordStoreRequest $request)
    {
      $request->user()->update([
        'password' => bcrypt($request->password)
      ]);
      Mail::to($request->user())->send(new PassswordUpdated());
      return redirect()->route('account.index')->withSuccess('Password updated!');
    }
}

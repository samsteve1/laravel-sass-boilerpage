<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;

class TwoFactorController extends Controller
{
    public function index()
    {
      $countries = Country::get()->sortBy('name');
      return view('account.twofactor.index', compact('countries'));
    }
    public function store()
    {

    }
}

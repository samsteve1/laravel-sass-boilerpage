<?php

namespace App\Http\Controllers\Account\Card;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpdateCardController extends Controller
{
    public function index()
    {
      return view('account.subscription.card.index');
    }
}

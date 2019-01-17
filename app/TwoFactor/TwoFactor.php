<?php

namespace App\TwoFactor;

use App\Models\User;

interface TwoFactor
{
  public function register(User $user);

  public function validateToken(User $suer, $token);

  public function delete(User $user);
}

<?php

namespace App\Models;

use App\Models\Traits\HasConfirmationTokens;
use App\Models\Traits\HasSubscriptions;
use App\Models\Teams;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
class User extends Authenticatable
{
    use Notifiable,
      HasConfirmationTokens,
      Billable,
      HasSubscriptions;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'activated', 'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasActivated() {
      return $this->activated;
    }
    public function hasNotActivated()
    {
      return !$this->hasActivated();
    }
    public function team()
    {
      return $this->hasOne(Team::class);
    }
}

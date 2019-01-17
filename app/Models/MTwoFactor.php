<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class MTwoFactor extends Model
{
    protected $fillable = [
      'phone', 'dial_code', 'identifier', 'verified'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public static function boot()
    {
      static::creating(function ($twoFactor) {
        optional($twoFactor->user->twoFactor)->delete();
      });
    }

    public function isVerified()
    {
      return $this->Verfied;
    }
}

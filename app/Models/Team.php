<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
      'name'
    ];
    public function owner()
    {
      return $this->belongsTo(User::class, 'user_id');
    }
}

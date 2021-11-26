<?php

namespace App\Models;

use App\Models\Token;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Authenticatable
{
    use HasFactory;

    public function accounts()
    {
        return $this->hasMany(Account::class);
    }

    public function tokens()
    {
        return $this->hasMany(Token::class);
    }

    protected $hidden = ["password", "remember_token"];
}

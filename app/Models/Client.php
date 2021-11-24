<?php

namespace App\Models;

use App\Models\Token;
use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
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
}

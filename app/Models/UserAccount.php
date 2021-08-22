<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccount extends Model
{
    use HasFactory;
    protected $fillable = ['name',
        'address',
        'description',
        'interest',
        'date_of_birth',
        'email',
        'account'];
    protected $casts = [
        'account' => 'encrypted',
    ];

    public function creditCard()
    {
        return $this->hasOne(CreditCard::class);
    }
}

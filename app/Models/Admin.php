<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function paymentConfirm()
    {
        return $this->hasMany(PaymentConfirm::class);
    }
    // public function validateCredentials(UserContract $user, array $credentials)
    // {
    //     $plain = $credentials['password'];

    //     return $this->hasher->check($plain, $user->getAuthPassword());
    // }

}
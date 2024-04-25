<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthenticatableUser;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPasswordNotification;

class User extends AuthenticatableUser implements Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    public function sendPasswordResetNotification($token)
{
    $this->notify(new CustomResetPasswordNotification($token));
}

}


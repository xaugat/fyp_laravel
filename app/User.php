<?php

namespace App;

use App\Http\Controllers\ResetPasswordController;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'roles_id', 'phone' , 'address', 'Achievements' , 'Job' // asking for validation to create user
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role() // accepts roles id
    {
        return $this->hasOne(Role::class, 'id', 'roles_id');
    }

    public function sendPasswordResetNotification($token) // handles reset password property by sending token
    {
        $this->notify(new PasswordResetNotification($token));
    }


}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'location',
        'phone',
        'about',
        'password_confirmation'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function rules(){
        return [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|max:255|unique:users,email,' . $this->id,
        ];
    }

    public function feedback(){
        return [
            'required:' => 'O campo :attribute deve ser preenchido',
            'email.email' => 'Preencha com um email válido',
            'email.unique' => 'EMAIL JA CADASTRADO!',
            'max' => 'Pode haver ate 255 caracteres',
            'min' => 'Preencha o campo com ao menos 3 caracteres'
        ];
    }

}

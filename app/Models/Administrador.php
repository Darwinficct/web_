<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Administrador extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='administrador';

    protected $fillable = [
        'email',
        'name',
        'password',
    ];
   //hidden quiere decir que esta oculto
    protected $hidden = [
        'password',
        
    ];
}

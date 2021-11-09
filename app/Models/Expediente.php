<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    protected $table = 'expediente';

    protected $fillable = [
        'id_prueba',
        'id_usuario',  
        'titulo',        
        'texto',
        'url_imagen',
        'url_recurso',
        'url_archivo',
    ];
}

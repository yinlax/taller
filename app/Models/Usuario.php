<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';
    
    protected $primaryKey = 'id_usuario';

    protected $fillable = ['nombre', 'email', 'password', 'id_rol', 'estado'];

    public $timestamps = true;

    public function rol()
    {
        return $this->belongsTo(Role::class, 'id_usuario', 'id_rol');
    }
}
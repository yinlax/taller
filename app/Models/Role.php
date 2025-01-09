<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $primaryKey = 'id_rol';

    protected $fillable = ['nombre'];
    public $timestamps = true;
    
    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'id_rol', 'id_usuario');
    }
}
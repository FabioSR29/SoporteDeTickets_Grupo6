<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'segundo_apellido', 'email', 'password', 'idrol'];

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idrol');
    }
}

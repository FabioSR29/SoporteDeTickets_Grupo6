<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion','archivo_adjunto', 'idprioridad', 'idestado', 'idagente', 'iduser'];

    public function prioridad()
    {
        return $this->belongsTo(Prioridad::class, 'idprioridad');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'idestado');
    }

    public function agente()
    {
        return $this->belongsTo(Agente::class, 'idagente');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'iduser');
    }

    public function categorias()
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}

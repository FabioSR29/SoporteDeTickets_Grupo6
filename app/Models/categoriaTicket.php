<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoriaTicket extends Model
{
    use HasFactory;
    protected $table = 'categoria_ticket';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

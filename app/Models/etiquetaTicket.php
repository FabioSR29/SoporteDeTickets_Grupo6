<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etiquetaTicket extends Model
{
    use HasFactory;
    protected $table = 'etiqueta_ticket';

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function etiqueta()
    {
        return $this->belongsTo(Etiqueta::class);
    }
}

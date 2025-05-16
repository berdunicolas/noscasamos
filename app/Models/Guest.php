<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'invitation_id',
        'nombre',
        'asiste',
        'nombre_a',
        'alimento',
        'mail',
        'telefono',
        'traslado',
        'comentarios',
    ];


    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }
}

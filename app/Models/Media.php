<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //HasFactory;

    protected $fillable = ['file_name', 'file_path', 'file_type', 'disk'];

    /**
     * Relación polimórfica con otros modelos.
     */
    public function mediaable()
    {
        return $this->morphTo();
    }
}

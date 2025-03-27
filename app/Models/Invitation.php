<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory, HasMedia;

    protected $fillable = [
        'event',
        'name',
        'seller_id',
        'plan',
        'date',
        'time',
        'time_zone',
        'duration',
        'active',
        'created_by',
        'path_name',
        'meta_title',
        'meta_description'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}

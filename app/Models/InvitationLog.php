<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationLog extends Model
{
    use HasFactory;

    protected $table = 'invitations_logs';

    protected $fillable = [
        'invitation_id',
        'user_id',
        'action',
        'description',
        'data',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function invitation()
    {
        return $this->belongsTo(Invitation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDataTime()
    {
        return $this->created_at
            ->copy()
            ->setTimezone('America/Argentina/Buenos_Aires')
            ->format('d/m/Y H:i');
    }
}
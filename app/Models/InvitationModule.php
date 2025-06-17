<?php

namespace App\Models;

use App\Enums\ModuleTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class InvitationModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'display_name',
        'active',
        'on_plan',
        'data',
        'invitation_id',
        'media_collections',
        'index',
    ];

    protected $casts = [
        'type' => ModuleTypeEnum::class,
        'active' => 'boolean',
        'on_plan' => 'boolean',
        'data' => 'array',
        'media_collections' => 'array',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'invitation_id', 'id');
    }

    public function media(string|null $collection = null): MorphMany
    {
        if(!in_array($collection, $this->media_collections) && $collection !== null) {
            throw new \InvalidArgumentException("La colección {$collection} no es válida.");
        }

        $query = $this->morphMany(Media::class, 'mediaable');

        if ($collection === null) return $query;
        
        return $query->where('collection_name', $collection);
    }


    public function addMedia(UploadedFile $file, string $collection): Media
    {
        if(!in_array($collection, $this->media_collections)) {
            throw new \InvalidArgumentException("La colección {$collection} no es válida.");
        }

        // Definir el disco de almacenamiento (puedes cambiarlo en config/filesystems.php)
        $disk = config('app.filesystem_disk');
        $path = Storage::disk($disk)->put($collection, $file);

        return $this->media()->create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'collection_name' => $collection,
            'disk' => $disk, // Guardamos en qué disco se almacena
        ]);
    }
}

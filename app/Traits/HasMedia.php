<?php

namespace App\Traits;


use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    /**
     * Indica si el modelo admite múltiples archivos o solo uno.
     * Debes sobrescribir esta variable en cada modelo según la necesidad.
     */
    //protected bool $allowsMultipleMedia = true;

    /**
     * Boot the trait to always load media relationships.
     */
    protected static function bootHasMedia()
    {
        static::addGlobalScope('withMedia', function ($query) {
            $query->with('media');
        });
    }

    /**
     * Relación polimórfica con Media.
     * Si el modelo solo admite un archivo, usa MorphOne.
     */
    public function media(): MorphMany|MorphOne
    {
        return $this->allowsMultipleMedia
            ? $this->morphMany(Media::class, 'mediaable')
            : $this->morphOne(Media::class, 'mediaable');
    }

    /**
     * Subir y asociar un archivo al modelo.
     */
    public function addMedia(UploadedFile $file): Media
    {
        // Definir el disco de almacenamiento (puedes cambiarlo en config/filesystems.php)
        $disk = config('app.filesystem_disk');
        $path = Storage::disk($disk)->put($file->getClientOriginalName(), $file);

        if (!$this->allowsMultipleMedia) {
            // Eliminar el archivo anterior antes de subir el nuevo
            $this->deletePreviousMedia();
        }

        return $this->media()->create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'disk' => $disk, // Guardamos en qué disco se almacena
        ]);
    }

    /**
     * Elimina el archivo anterior si solo se permite un archivo.
     */
    protected function deletePreviousMedia(): void
    {
        $previousMedia = $this->media()->first();
        if ($previousMedia) {
            Storage::disk($previousMedia->disk)->delete($previousMedia->file_path);
            $previousMedia->delete();
        }
    }

    /**
     * Obtener la URL del archivo almacenado.
     */
    public function getMediaUrl(): ?string
    {
        $media = $this->media()->first();
        return $media ? Storage::url($media->file_path) : null;
    }

    /**
     * Eliminar archivos asociados al modelo.
     */
    public function deleteMedia(): bool
    {
        $this->media?->each(function ($media) {
            Storage::delete($media->file_path);
            $media->delete();
        });

        return true;
    }
}

<?php

namespace App\Traits;


use App\Models\Media;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

trait HasMedia
{
    protected array $mediaCollections = ['default'];

    /*
    public function construct (array $attributes = [])
    {
        parent::__construct($attributes);

        if(isset($this->customMediaCollections)){
            $this->mediaCollections = array_merge($this->mediaCollections, $this->customMediaCollections);
            dd("hola");
        }
    }*/

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
    public function media(string|null $collection = null): MorphMany
    {
        if(isset($this->customMediaCollections)){
            $this->mediaCollections = array_merge($this->mediaCollections, $this->customMediaCollections);
        }

        if(!in_array($collection, $this->mediaCollections) && $collection !== null) {
            throw new \InvalidArgumentException("La colección {$collection} no es válida.");
        }

        $query = $this->morphMany(Media::class, 'mediaable');

        if ($collection === null) return $query;
        
        return $query->where('collection_name', $collection);
    }

    /**
     * Subir y asociar un archivo al modelo.
     */
    public function addMedia(UploadedFile $file, string $collection = 'default', string $rootPath = ''): Media
    {
        if(isset($this->customMediaCollections)){
            $this->mediaCollections = array_merge($this->mediaCollections, $this->customMediaCollections);
        }
        if(!in_array($collection, $this->mediaCollections)) {
            throw new \InvalidArgumentException("La colección {$collection} no es válida.");
        }

        // Definir el disco de almacenamiento (puedes cambiarlo en config/filesystems.php)
        $disk = config('app.filesystem_disk');
        $path = Storage::disk($disk)->put((($rootPath) ? $rootPath . '/' : '') . $collection, $file);

        return $this->media()->create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'collection_name' => $collection,
            'disk' => $disk, // Guardamos en qué disco se almacena
        ]);
    }

    /**
     * Elimina el archivo anterior si solo se permite un archivo.
     */
    /*
    protected function deletePreviousMedia(): void
    {
        $previousMedia = $this->media()->first();
        if ($previousMedia) {
            Storage::disk($previousMedia->disk)->delete($previousMedia->file_path);
            $previousMedia->delete();
        }
    }*/

    /**
     * Obtener la URL del archivo almacenado.
     */
    /*
    public function getMediaUrl(): ?string
    {
        $media = $this->media()->first();
        return $media ? Storage::url($media->file_path) : null;
    }*/

    /**
     * Eliminar archivos asociados al modelo.
     */
    /*
    public function deleteAllMedia(): bool
    {
        $this->media?->each(function ($media) {
            Storage::delete($media->file_path);
            $media->delete();
        });

        return true;
    }*/
}

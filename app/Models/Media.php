<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    //HasFactory;

    protected $fillable = ['file_name', 'file_path', 'file_type', 'disk', 'collection_name'];

    /**
     * Relación polimórfica con otros modelos.
     */
    public function mediaable()
    {
        return $this->morphTo();
    }


    public function delete(){
        // Eliminar el archivo del disco
        if ($this->disk) {
            Storage::disk($this->disk)->delete($this->file_path);
        }

        // Llamar al método delete() del modelo padre
        return parent::delete();
    }

    public function getMediaUrl(): ?string
    {
        return Storage::url($this->file_path);
    }

    public function getFile(): ?UploadedFile
    {
        if ($this->disk && Storage::disk($this->disk)->exists($this->file_path)) {
            // 1. Obtener el contenido del archivo
            $contents = Storage::disk($this->disk)->get($this->file_path);

            // 2. Crear un archivo temporal
            $tempPath = tempnam(sys_get_temp_dir(), 'upload_');
            file_put_contents($tempPath, $contents);

            // 3. Obtener nombre original si lo tenés, o uno por defecto
            $originalName = basename($this->file_path);

            // 4. Crear instancia de UploadedFile
            return new UploadedFile(
                $tempPath,
                $originalName,
                null, // MIME type (Laravel lo puede detectar automáticamente si es null)
                null, // Error code
                true  // Set to true since it's a test (bypasses move_uploaded_file check)
            );
        }

        return null;
    }
}

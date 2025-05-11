<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
}

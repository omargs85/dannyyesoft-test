<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Documento extends Model
{
    use HasFactory;

    protected $table = 'tw_documentos';
    public $timestamps = false;

    protected $casts = ['N_Obligatorio' => 'boolean'];

    public function DocumentosCorporativos() {
        return $this->hasMany(DocumentoCorporativo::class, 'tw_documentos_id');
    }
}

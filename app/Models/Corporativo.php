<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Corporativo extends Model
{
    use HasFactory;

    protected $table = 'tw_corporativos';

    public function Usuarios(): BelongsTo {
        return $this->belongsTo(Usuario::class);
    }

    public function Documentos(): BelongsToMany {
        return $this->belongsToMany(Documento::class, 'tw_documentos_corporativos');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Corporativo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tw_corporativos';

    public function Usuario(): BelongsTo {
        return $this->belongsTo(Usuario::class);
    }

    public function Documentos(): BelongsToMany {
        return $this->belongsToMany(Documento::class, 'tw_documentos_corporativos');
    }

    public function Empresas(): HasMany
    {
        return $this->hasMany(EmpresaCorporativo::class, 'tw_corporativos_id');
    }

    public function Contactos(): HasMany {
        return $this->hasMany(ContactoCorporativo::class, 'tw_corporativos_id');
    }

    public function Contratos(): HasMany {
        return $this->hasMany(ContratoCorporativo::class, 'tw_corporativos_id');
    }
}

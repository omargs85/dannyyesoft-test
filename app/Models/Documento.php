<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Documento extends Model
{
    use HasFactory;

    public function Corporativos(): BelongsToMany {
        return $this->belongsToMany(Corporativo::class, 'tw_documentos_corporativos');
    }
}

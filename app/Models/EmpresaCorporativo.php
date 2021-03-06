<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmpresaCorporativo extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tw_empresas_corporativos';
    public $timestamps = false;

    public function Corporativo(): BelongsTo {
        return $this->belongsTo(Corporativo::class);
    }
}

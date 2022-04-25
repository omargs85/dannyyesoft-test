<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ContactoCorporativo extends Model
{
    use HasFactory;

    protected $table = 'tw_contactos_corporativos';
    public $timestamps = false;

    public function Corporativo(): BelongsTo {
        return $this->belongsTo(Corporativo::class);
    }
}

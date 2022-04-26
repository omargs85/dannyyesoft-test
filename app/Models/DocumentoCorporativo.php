<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class DocumentoCorporativo.
 *
 * @property Corporativo $Corporativo
 * @property Documento $Documento
 *
 **/
class DocumentoCorporativo extends Model
{
    use HasFactory;

    protected $table = 'tw_documentos_corporativos';
    public $timestamps = false;

    public function Corporativo() {
        return $this->belongsTo(Corporativo::class, 'tw_corporativos_id');
    }

    public function Documento() {
        return $this->belongsTo(Documento::class, 'tw_documentos_id');
    }
}

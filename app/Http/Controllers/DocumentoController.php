<?php

namespace App\Http\Controllers;

use App\Http\Resources\DocumentoResource;
use App\Models\Documento;
use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    public function showDocumento(Documento $documento) {
        return response([
            'msg' => 'Ok',
            'success' => true,
            'data' => DocumentoResource::make($documento),
            'exception' => null,
            'time_execution' => microtime(true) - LARAVEL_START
        ], 200);
    }
}

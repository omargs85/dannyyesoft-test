<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;

class CorporativoController extends Controller
{
    public function showCorporativo(Corporativo $corporativo) {
        \Log::info($corporativo->id);
        return response([
            'msg' => 'Ok',
            'success' => true,
            'data' => $corporativo->load(['Contactos', 'Empresas']),
            'exception' => null,
            'time_execution' => microtime(true) - LARAVEL_START
        ], 200);
    }
}

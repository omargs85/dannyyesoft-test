<?php

use App\Http\Controllers\SimpleAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

$simpleAuthControllerClassName = SimpleAuthController::class;

Route::post('/login', "$simpleAuthControllerClassName@login");
Route::post('/logout', "$simpleAuthControllerClassName@logout");
Route::post('/password/email', "$simpleAuthControllerClassName@forgot");
Route::get('/password/verify-token/{token}', "$simpleAuthControllerClassName@verifyToken");
Route::post('/password/reset', "$simpleAuthControllerClassName@reset");

Route::group([
    'middleware' => ['auth:api', "scopes:tw_corporativos,tw_empresas_corporativos"]
], function() {
    Route::get('/corporativos/{corporativo}', 'App\Http\Controllers\CorporativoController@showCorporativo')
        ->where(['corporativo' => '[0-9]+']);
});

Route::group([
    'middleware' => ['auth:api', "scopes:tw_documentos,tw_documentos_corporativos"]
], function() {
    Route::get('/documentos/{documento}', 'App\Http\Controllers\DocumentoController@showDocumento')
        ->where(['documento' => '[0-9]+']);
});

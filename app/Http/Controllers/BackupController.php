<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function runBackup() {
        try {
            Artisan::call('backup:db');
            return response([
                'msg' => 'Backed up Successfully!',
                'data' => [],
                'success' => true,
                'exceptions' => null,
                'time_execution' => microtime(true) - LARAVEL_START
            ],
                200);
        }
        catch(\Exception $ex) {
            return response([
                'msg' => 'Backup Failed :(',
                'data' => [],
                'success' => false,
                'exceptions' => $ex->getMessage(),
                'time_execution' => microtime(true) - LARAVEL_START
            ],
                500);
        }
    }
}

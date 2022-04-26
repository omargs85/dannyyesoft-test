<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BackupDBCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backup:db';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Backup Db Command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $path = storage_path('app/backup');
        if(!File::isDirectory($path)){
            File::makeDirectory($path, 0777, true, true);
        }

        $tableNames = env('TABLAS_A_RESPALDAR') ?
            implode(' ', explode(',', env('TABLAS_A_RESPALDAR'))) :
            '';

        $filename = "backup-" . Carbon::now()->format('d-m-Y-h:m') . ".sql";
        $command = "mysqldump --user=" . env('DB_USERNAME') .
            " --password=" . env('DB_PASSWORD') .
            " --host=" . env('DB_HOST') .
            " " . env('DB_DATABASE') .
            " $tableNames ".
            "  > " .
            storage_path() . "/app/backup/" . $filename;
        $returnVar = NULL;
        $output = NULL;

        exec($command, $output, $returnVar);
        return 0;
    }
}

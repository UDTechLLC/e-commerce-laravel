<?php

namespace App\Console\Commands\Database;

use Illuminate\Console\Command;

class TruncateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate {table} {--foreign=enabled}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate specific table';

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
     * @return mixed
     */
    public function handle()
    {
        $table = $this->argument('table');
        $foreign = $this->option('foreign');

        if ($foreign === 'enabled') {
            \DB::table($table)->truncate();
        } elseif ($foreign === 'disabled') {
            \Schema::disableForeignKeyConstraints();
            \DB::table($table)->truncate();
            \Schema::enableForeignKeyConstraints();
        }
    }
}

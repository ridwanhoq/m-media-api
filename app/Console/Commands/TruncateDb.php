<?php

namespace App\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TruncateDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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

        try{
            Schema::disableForeignKeyConstraints();
            $databaseName = DB::getDatabaseName();
            $tables = DB::select("SELECT * FROM information_schema.tables WHERE table_schema = '$databaseName'");
            foreach ($tables as $table) {
                $name = $table->TABLE_NAME;
       
                if ($name == 'migrations') {
                    continue;
                }
                DB::table($name)->truncate();
            }
            Schema::enableForeignKeyConstraints();
            $this->comment('Truncate finished.');
            $this->comment('Don\'t forget to run db:seed');
        }catch(Exception $e){
            $this->comment('Error !');
            $this->comment($e->getMessage());
            Schema::enableForeignKeyConstraints();#dont forget this if it fails
        }
    }
}

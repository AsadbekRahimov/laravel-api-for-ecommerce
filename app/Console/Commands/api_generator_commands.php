<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class api_generator_commands extends Command
{
    protected $signature = 'api_generator:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Api generator command';

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
        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();
        foreach ($tables as $table) {
            echo $table." ";
            if(preg_match("/shop/", $table)){
                // $table="shop_order";
                Artisan::call('infyom:api_scaffold '.$this->dashesToCamelCase($table).' --fromTable --tableName='.$table.' ');
                //php artisan infyom:api_scaffold auto --fromTable --tableName=auto --skip=views,controllers
                //infyom:api_scaffold auto --fromTable --tableName=auto --skip=views,controllers,routes
            }
        }


    }

    public function dashesToCamelCase($string, $capitalizeFirstCharacter = false) 
    {

        $str = str_replace('-', '', ucwords($string, '-'));

        if (!$capitalizeFirstCharacter) {
            $str = lcfirst($str);
        }

        return $str;
    }
}

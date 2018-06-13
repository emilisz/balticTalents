<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // call our class and run our seeds
        $this->call('AllTablesSeeder');
        $this->command->info('app seeds finished.'); // show information in the command line after everything is run
    }
}

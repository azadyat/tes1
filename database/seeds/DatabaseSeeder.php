<?php

use Illuminate\Database\Seeder;
use App\model;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(mitraSeeder::class);
    }
}

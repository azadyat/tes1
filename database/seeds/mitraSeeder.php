<?php

use Illuminate\Database\Seeder;
use App\model;

class mitraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\model\Mitra::class, 10)->create();
    }
}

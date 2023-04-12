<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenontonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penontons', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100)->nullable();
            $table->string('alamat', 120)->nullable();
            $table->string('no_hp', 20)->nullable();
            $table->string('id_tiket', 20)->nullable();
            $table->string('status', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penontons');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sous_taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->tinyInteger('status');
            $table->unsignedBigInteger('tache_id')->nullable();
            $table->foreign('tache_id')->references('id')->on('taches')->onDelete('cascade');
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
        Schema::dropIfExists('soustaches');
    }
};

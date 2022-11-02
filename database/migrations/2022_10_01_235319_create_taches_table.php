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
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image')->nullable();
            $table->text('description');
            $table->unsignedBigInteger('message_id')->nullable();
            $table->foreign('message_id')->references('id')->on('messages')->onDelete('cascade');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
            $table->enum('priorite', ["Urgent", "Important", "Normal"]);
            $table->enum('status', ["A faire" , "En cours", "En revue", "Terminier"]);
            $table->integer('ordre');
            $table->date('echeance');
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
        Schema::dropIfExists('taches');
    }
};

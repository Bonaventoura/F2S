<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfirmationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('projet_id')->unique();
            $table->string('nom_parrain')->nullable();
            $table->string('prenoms_parrain')->nullable();
            $table->string('fonction')->nullable();
            $table->string('email_address')->nullable();
            $table->string('telephone')->nullable();
            $table->text('calendrier');
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
        Schema::dropIfExists('confirmations');
    }
}

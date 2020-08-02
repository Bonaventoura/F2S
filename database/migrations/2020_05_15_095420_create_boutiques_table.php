<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoutiquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boutiques', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('accounts_id')->unsigned()->unique();
            $table->string('nom_boutique');
            $table->string('domaine_activite');
            $table->string('pays');
            $table->string('ville');
            $table->string('quartier');
            $table->string('contact_boutique');
            $table->string('email_boutique');
            $table->string('mode_reglement');
            $table->string('avatar');
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
        Schema::dropIfExists('boutiques');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nom');
            $table->string('prenoms');
            $table->string('sexe')->nullable();
            $table->string('pays_id')->nullable();
            $table->string('ville')->nullable();
            $table->date('date_n')->nullable();
            $table->integer('num_tel');
            $table->string('email');
            $table->string('pseudo')->unique();
            $table->string('password');
            $table->boolean('actif')->default(0);
            $table->string('code')->unique();
            $table->string('photo_profil')->nullable();
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
        Schema::dropIfExists('accounts');
    }
}

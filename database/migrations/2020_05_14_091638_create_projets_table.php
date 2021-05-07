<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {

            $table->bigIncrements('id');
            //informations de compte
            $table->integer('account_id'); //references table accounts on accounts.id = projets.accounts_id
            //Quartier

            //informations sur le projet
            $table->string('sm');//situation matrimoniale
            $table->text('description');
            $table->integer('cout_projet');
            $table->integer('apport_personnel');
            $table->string('nature_projet');
            $table->string('domaine');
            $table->string('actualite');
            $table->string('type_remboursement');
            $table->string('taille_entreprise');
            $table->string('plan_affaire');
            $table->boolean('financer')->default(0);
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
        Schema::dropIfExists('projets');
    }
}

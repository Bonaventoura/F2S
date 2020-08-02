<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmitProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submit_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('boutique_id');
            $table->string('product_id');
            $table->integer('quantite_stock');
            $table->text('description');
            $table->boolean('valider')->default(0);
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
        Schema::dropIfExists('submit_products');
    }
}

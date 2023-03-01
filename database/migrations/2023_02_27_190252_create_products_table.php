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
        Schema::create('products', function (Blueprint $table) {
            $table->id('p_id');
            $table->string('p_image');
            $table->string('p_title');
            $table->string('p_description');
            $table->string('p_price');
            $table->string('p_sale_price');
            $table->string('p_quantity');
            $table->string('p_status');

            $table->unsignedBigInteger('category_id');
            $table->foreign('cat_id')->references('cat_id')->on('category');

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
        Schema::dropIfExists('products');
    }
};

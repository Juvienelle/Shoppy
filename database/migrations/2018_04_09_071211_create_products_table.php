<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('photo');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('stock');
            $table->timestamps();
        });

        Schema::create('product_user', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('user_id');
            $table->integer('quantity')->default(1);
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
        Schema::dropIfExists('product_user');
    }
}

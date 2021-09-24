<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('title');
            $table->string('metaTitle')->nullable();
            $table->string('slug');
            $table->string('summary')->nullable();
            $table->smallInteger('type')->nullable();
            $table->string('sku')->nullable();
            $table->float('price');
            $table->float('discount')->nullable();
            $table->smallInteger('quantity')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('status')->default(1);
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
}

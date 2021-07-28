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
            $table->integer('cat_id');
            $table->integer('subcat_id');
            $table->integer('subsubcat_id');
            $table->integer('brand_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('price');
            $table->string('discount');
            $table->string('quantity');
            $table->string('summary');
            $table->string('description');
            $table->string('stock');
            $table->string('thumbnail');
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

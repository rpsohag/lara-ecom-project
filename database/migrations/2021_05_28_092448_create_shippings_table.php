<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('shipping_email');
            $table->string('shipping_phone');
            $table->foreignId('country_id');
            $table->foreignId('division_id');
            $table->foreignId('district_id');
            $table->foreignId('thana_id');
            $table->string('shipping_address'); 
            $table->string('order_note')->nullable(); 
            $table->string('post_code')->nullable();
            $table->string('coupon_code')->nullable();
            $table->integer('terms_condition')->default(0)->comments('0=disagree 1=agree');
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
        Schema::dropIfExists('shippings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('o_number')->nullable();
            $table->integer('status')->default(0);
            $table->integer('o_type')->default(0);
            $table->integer('user_id');
            $table->integer('user_address_id');
            $table->text('user_comment');
            $table->decimal('subtotal', 11,2);
            $table->decimal('delivery', 11,2);
            $table->decimal('total', 11,2);
            $table->integer('payment_method')->default(0);
            $table->text('payment_info');
            $table->dateTime('paid_at');
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
        Schema::dropIfExists('orders');
    }
}

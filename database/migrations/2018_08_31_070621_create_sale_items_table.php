<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sale_id');
            $table->integer('item_id');
            $table->decimal('commission');
            $table->decimal('quantity', 8, 0);

            $table->foreign('sale_id')
                  ->references('id')->on('sales')
                  ->onDelete('cascade');

            $table->foreign('item_id')
                  ->references('id')->on('items');
                  
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
        Schema::dropIfExists('sale_items');
    }
}

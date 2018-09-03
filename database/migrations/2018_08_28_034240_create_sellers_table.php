<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->decimal('cpf', 11, 0);
            $table->date('dtborn');
            $table->string('gender');
            $table->decimal('phone', 11, 0);
            $table->date('dtemployed');
            $table->decimal('cep', 8, 0);
            $table->string('adress');
            $table->integer('adressnumber');
            $table->string('district');
            $table->string('city');
            $table->string('state');
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
        Schema::dropIfExists('sellers');
    }
}

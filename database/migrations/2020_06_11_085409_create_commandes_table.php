<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('dateCom')->default(\DB::raw('CURRENT_TIMESTAMP'))->nullable();
            $table->dateTime('dateExp')->nullable();
            $table->string('adresseliv')->nullable();
            $table->string('Telephone')->nullable();
            $table->string('ville')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('client_id')->unsigned();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     * 
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}

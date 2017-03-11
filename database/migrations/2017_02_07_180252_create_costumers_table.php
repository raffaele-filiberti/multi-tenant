<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('costumer_user', function (Blueprint $table) {
            $table->integer('costumer_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('costumer_id')->references('id')->on('costumers')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('costumers');
        Schema::dropIfExists('costumer_user');

    }
}

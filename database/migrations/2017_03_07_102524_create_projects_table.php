<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /* TODO: update model with relation */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('agency_id')->unsigned();
            $table->integer('costumer_id')->unsigned();
            $table->string('name');
            $table->text('description');
            $table->boolean('archivied')->default(false);
            $table->boolean('private')->default(false);
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('projects');
    }
}

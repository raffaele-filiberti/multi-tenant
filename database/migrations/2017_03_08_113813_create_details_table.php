<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('detail_step', function (Blueprint $table) {
            $table->integer('step_id')->unsigned();
            $table->integer('detail_id')->unsigned();

            $table->foreign('step_id')->references('id')->on('steps')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('detail_id')->references('id')->on('details')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['step_id', 'detail_id']);
        });

        Schema::create('detail_step_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('detail_id')->unsigned();
            $table->integer('step_task_id')->unsigned();

            $table->foreign('step_task_id')->references('id')->on('step_task')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('detail_id')->references('id')->on('details')
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
        Schema::dropIfExists('details');
        Schema::dropIfExists('detail_step');
    }
}

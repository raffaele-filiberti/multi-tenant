<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->date('data');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('detail_step_task_date', function (Blueprint $table) {
            $table->integer('detail_step_task_id')->unsigned();
            $table->integer('date_id')->unsigned();
            $table->integer('status')->default(0);

            $table->foreign('detail_step_task_id')->references('id')->on('detail_step_task')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('date_id')->references('id')->on('files')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['detail_step_task_id', 'date_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dates');
    }
}

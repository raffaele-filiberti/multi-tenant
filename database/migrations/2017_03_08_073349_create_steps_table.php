<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->integer('template_id')->unsigned();
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('template_id')->references('id')->on('templates')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('step_task', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('step_id')->unsigned();
            $table->integer('task_id')->unsigned();
            $table->integer('ref_id')->unsigned()->nullable();
            // 0 -> refused 1 -> completed 2 -> processing
            $table->integer('status')->default(0);
            $table->boolean('missed')->default(false);
            $table->boolean('hidden')->default(false);
            $table->text('ref_description')->nullable();
            $table->date('expiring_date');
            $table->timestamps();

            $table->foreign('step_id')->references('id')->on('steps')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('task_id')->references('id')->on('tasks')
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
        Schema::dropIfExists('step_task');
        Schema::dropIfExists('steps');
    }
}

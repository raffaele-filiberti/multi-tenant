<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('agency_id')->unsigned();
            $table->string('filename');
            $table->text('description');
            $table->string('mime');
            $table->string('path');
            $table->float('size');
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
                ->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('detail_step_task_file', function (Blueprint $table) {
            $table->integer('detail_step_task_id')->unsigned();
            $table->integer('file_id')->unsigned();
            $table->integer('status')->default(0);
            $table->foreign('detail_step_task_id')->references('id')->on('detail_step_task')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['detail_step_task_id', 'file_id']);
        });

        Schema::create('file_task', function (Blueprint $table) {
            $table->integer('task_id')->unsigned();
            $table->integer('file_id')->unsigned();

            $table->foreign('task_id')->references('id')->on('tasks')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('files')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['task_id', 'file_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file_task');
        Schema::dropIfExists('detail_step_task_file');
        Schema::dropIfExists('files');
    }
}

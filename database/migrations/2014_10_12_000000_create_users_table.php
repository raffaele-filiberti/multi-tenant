<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('motto')->nullable();
            $table->text('description')->nullable();
            $table->boolean('hidden')->default(false);
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('agency_id')->unsigned();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->boolean('ibernate')->default(false);
            $table->boolean('notify')->default(true);
            $table->boolean('subscribed')->default(false);

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('agency_id')->references('id')->on('agencies')
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
        Schema::dropIfExists('agencies');
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBindings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bindings', function (Blueprint $table) {
            $table->id();
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBiginteger('platform_id');
            $table->foreign('platform_id')->references('id')->on('platforms');
            $table->text('account_info');
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
        Schema::dropIfExists('bindings');
    }
}

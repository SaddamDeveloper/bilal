<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->decimal('get');
            $table->decimal('give');
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pair_id');
            $table->foreign('pair_id')->references('id')->on('pairs');
            $table->string('rating');
            $table->text('additional_information');
            $table->decimal('insurance');
            $table->string('status'); // 10% published, 0% 
            $table->string('origin');
            $table->timestamps();
        });

        Schema::create('escrows', function (Blueprint $table) {
            $table->id();
            $table->string('direction');
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->string('rates',20);
            $table->decimal('amount');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('escrows');
        Schema::dropIfExists('offers');
    }
}

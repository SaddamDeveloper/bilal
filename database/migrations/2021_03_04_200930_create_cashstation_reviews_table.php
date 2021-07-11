<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashstationReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashstation_reviews', function (Blueprint $table) {
            $table->id();
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('cashstation_id');
            $table->string('review');
            $table->mediumText('comment')->nullable();
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
        Schema::dropIfExists('cashstation_reviews');
    }
}

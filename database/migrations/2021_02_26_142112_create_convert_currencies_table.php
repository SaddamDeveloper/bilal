<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConvertCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convert_currencies', function (Blueprint $table) {
            $table->id();
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('source_currency');
            $table->foreign('source_currency')->references('id')->on('currencies');
            $table->unsignedBigInteger('target_currency');
            $table->foreign('target_currency')->references('id')->on('currencies');
            $table->decimal('source_amount');
            $table->decimal('converted_amount');
            $table->decimal('exchange_rate');
            $table->decimal('exchange_fee');
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
        Schema::dropIfExists('convert_currencies');
    }
}

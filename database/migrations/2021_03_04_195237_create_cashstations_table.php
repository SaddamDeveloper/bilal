<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashstationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cashstations', function (Blueprint $table) {
            $table->id();
            $table->char('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('location');
            $table->integer('transaction_id');
            $table->mediumText('open_currency');
            $table->text('tagline')->nullable();
            $table->decimal('max_fee_charge', 10, 2)->default(0);
            $table->tinyInteger('status')->default(1)->comment('1=open,2=close');
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
        Schema::dropIfExists('cashstations');
    }
}

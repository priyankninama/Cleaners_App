<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('cleaner_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamp('date_time');
            $table->integer('no_of_hours');
            $table->timestamp('booked_time');
            $table->timestamps();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('cleaner_id')->references('id')->on('cleaners');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_details');
    }
}

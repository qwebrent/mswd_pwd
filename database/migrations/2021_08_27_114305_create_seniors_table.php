<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeniorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seniors', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('fname');
            $table->string('mname');
            $table->string('reg_num')->unique();
            $table->string('weight');
            $table->string('height');
            $table->date('b_day');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('civstatus_id')->unsigned();
            $table->string('mobile_num');
            $table->string('street_address');
            $table->bigInteger('barangay_id')->unsigned();
            $table->string('municipality');
            $table->string('province');
            $table->string('e_name');
            $table->string('e_contact');
            $table->string('e_address');
            $table->string('senior_illness');
            $table->boolean('status')->default(0);
            $table->mediumText('senior_file')->nullable();
            $table->mediumText('senior_img')->nullable();
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
        Schema::dropIfExists('seniors');
    }
}

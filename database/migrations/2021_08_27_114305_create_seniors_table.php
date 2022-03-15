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
            $table->string('lname', 32);
            $table->string('fname', 32);
            $table->string('mname', 32);
            $table->string('suffix', 32)->nullable();
            $table->string('reg_num', 64)->unique();
            $table->string('weight', 32);
            $table->string('height', 32);
            $table->date('b_day');
            $table->bigInteger('gender_id')->unsigned();
            $table->bigInteger('civstatus_id')->unsigned();
            $table->string('mobile_num', 64);
            $table->string('street_address', 64);
            $table->bigInteger('barangay_id')->unsigned();
            $table->string('municipality', 64);
            $table->string('province', 64);
            $table->string('e_name', 32);
            $table->string('e_contact', 64);
            $table->string('e_address', 64);
            $table->string('senior_illness', 32);
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

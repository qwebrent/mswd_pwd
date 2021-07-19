<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwddisabilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwddisabilities', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('disability_id')->constrained('pwdinfos');
            $table->unsignedBigInteger('disability_id');
            $table->unsignedBigInteger('p_w_d_info_id');
            $table->json('disability_name');
            $table->foreign('disability_id')->references('id')->on('pwdinfos')->onUpdate('cascade');
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
        Schema::dropIfExists('pwddisabilities');
    }
}

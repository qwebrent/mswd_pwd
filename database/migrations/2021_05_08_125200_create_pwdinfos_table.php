<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePwdinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pwdinfos', function (Blueprint $table) {
            $table->id();
                $table->string('lname', 32);
                $table->string('fname', 32);
                $table->string('mname', 32);
                $table->string('suffix', 32)->nullable();
                $table->string('reg_num', 64)->unique();
                $table->string('sss_num', 64)->unique()->nullable();
                $table->string('phealth_num', 64)->unique()->nullable();
                $table->date('b_day');
                $table->bigInteger('gender_id')->unsigned();
                $table->bigInteger('civstatus_id')->unsigned();
                $table->bigInteger('educbg_id')->unsigned();
                $table->string('mobile_num', 32);
                $table->string('street_address', 64);
                $table->bigInteger('barangay_id')->unsigned();
                $table->string('municipality', 64);
                $table->string('province', 64);
                $table->string('emp_status', 64);
                $table->string('emp_type', 64);
                $table->string('pwd_skill', 64);
                $table->mediumText('pwd_file')->nullable();
                $table->mediumText('pwd_img')->nullable();
                $table->json('disability_name');
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
        Schema::dropIfExists('pwdinfos');
    }
}

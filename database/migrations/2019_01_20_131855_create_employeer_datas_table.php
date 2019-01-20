<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeer_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sus_card');
            $table->string('allergic')->nullable();
            $table->string('breed');
            $table->string('formation');
            $table->string('specialization')->nullable();
            $table->string('contract');
            $table->string('statutory');
            $table->integer('workload');
            $table->string('shift');
            $table->longText('observations')->nullable();
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
        Schema::dropIfExists('employee_datas');
    }
}

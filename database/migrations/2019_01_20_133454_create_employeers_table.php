<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employeers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employeer_data_id');
            $table->integer('responsability_id');
            $table->integer('birth_certificate_id');
            $table->integer('address_id');
            $table->integer('general_registration_id'); //Quando for nulo é uma instituição.
            //$table->integer('school_id');
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
        Schema::dropIfExists('employeers');
    }
}

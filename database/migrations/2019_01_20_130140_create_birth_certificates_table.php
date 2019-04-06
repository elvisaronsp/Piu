<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBirthCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('birth_certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('book');
            $table->string('birth_number')->nullable();
            $table->string('leaf');
            $table->string('term')->nullable();
            $table->date('birth_emission');
            $table->string('emission_city');
            $table->string('emission_state');
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
        Schema::dropIfExists('birth_certificates');
    }
}

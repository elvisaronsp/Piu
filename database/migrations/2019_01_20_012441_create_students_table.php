<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('genre');
            $table->string('born_in');
            $table->string('bolsa_familia')->nullable();
            $table->string('sus');
            $table->integer('address_id');
            $table->integer('birth_certificate_id');
            $table->integer('general_registration_id');
            $table->integer('school_id');
            $table->string('special')->nullable();
            $table->boolean('special_report')->default(false);
            $table->boolean('multi_activity')->default(false);
            $table->enum('status', ['transferred', 'canceled', 'registered', 'idle'])->default('idle');
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
        Schema::dropIfExists('students');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_transfers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->integer('old_school_id');
            $table->integer('new_school_id');
            $table->boolean('accepted')->nullable()->default(null);
            $table->integer('user_id'); //Quem fez a transferência
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
        Schema::dropIfExists('student_transfers');
    }
}

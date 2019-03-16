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
            $table->integer('old_school');
            $table->integer('new_school');
            $table->boolean('accepted')->default(false);
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

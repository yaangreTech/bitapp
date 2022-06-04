<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->String('matricule')->unique();
            $table->String('first_name');
            $table->String('Last_name');
            $table->String('gender');
            $table->String('phone');
            $table->String('birth_date');
            $table->string('birth_place')->nullable();
            $table->String('email')->unique();
            $table->String('status')->default('active');
            $table->foreignId('promotion_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('semester_id')->constrained()->onDelete('cascade');
            $table->foreignId('year_id')->constrained()->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('name');
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
        Schema::dropIfExists('tus');
    }
}

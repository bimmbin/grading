<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->integer('loading_id');
            $table->integer('profile_id');
            // $table->integer('school_year_id');
            $table->integer('prelim');
            $table->integer('midterm');
            $table->integer('finals');
            $table->integer('fg');
            $table->integer('ng');
            $table->text('remarks');
            $table->text('status');
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
        Schema::dropIfExists('grades');
    }
};

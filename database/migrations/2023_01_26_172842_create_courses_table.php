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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name')->unique();
            $table->string('course_category')->nullable();
            $table->Text('course_title')->nullable();
            $table->Text('course_description')->nullable();
            $table->string('course_duration')->nullable();
            $table->integer('price')->nullable();
            $table->string('created_by')->nullable();
            $table->string('banner_image')->nullable();
            $table->integer('status')->default('1');
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
        Schema::dropIfExists('courses');
    }
};

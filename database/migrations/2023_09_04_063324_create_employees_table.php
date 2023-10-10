<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('departments_id')->references('id')->on('departments');
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('gender')->default(1)->comment('1:male,2:female,3:transgender');
            $table->date('dob')->nullable();
            $table->text('address')->nullable();
            $table->string('mobile',15)->nullable();
            $table->string('email')->nullable();
            $table->foreignId('departments_id')->references('id')->on('departments');
            $table->foreignId('designations_id')->references('id')->on('designations');
            $table->date('date_of_joining')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
        Schema::dropIfExists('designations');
        Schema::dropIfExists('departments');
    }
};

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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('nis')->unique();
            $table->string('name');
            $table->string('addres');
            $table->enum('gender', ['Man', 'Woman']);
            $table->enum('religion', ['Christianity', 'Catholicism', 'Hinduism', 'Islam', 'Buddhism', 'Confucianism']);
            $table->enum('major', ['Software Engineering', 'Multimedia', 'Computer Network Engineering', 'Tourism Services Business', 'Culinary', 'Hospitality']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

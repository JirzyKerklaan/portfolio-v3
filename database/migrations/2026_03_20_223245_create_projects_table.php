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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->date('year');
            $table->string('client');
            $table->string('title');
            $table->string('description');
            $table->longText('long_text');
            $table->string('role');
            $table->string('image_url');
            $table->string('color');
            $table->string('url');
            $table->boolean('archived')->default(false);
            $table->string('order')->autoIncrement();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

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
            $table->text('short_description');
            $table->string('role');

            $table->string('cover_img')->nullable();
            $table->string('mockup_img')->nullable();

            $table->string('color');
            $table->string('url');

            $table->longText('description');
            $table->longText('overview');
            $table->longText('outcome');

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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Kategori bebas, mis: "Design Tool", "Research", "Frontend"
            $table->string('category')->nullable();
            // Level 1-5, dipakai untuk indikator visual di frontend (opsional)
            $table->unsignedTinyInteger('level')->default(3);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};

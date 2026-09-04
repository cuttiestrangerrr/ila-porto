<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('role')->nullable(); // mis: "UI/UX Designer"
            $table->text('summary'); // ringkasan singkat untuk kartu proyek
            $table->longText('description')->nullable(); // isi lengkap case study
            $table->string('cover_image')->nullable();
            $table->json('gallery')->nullable(); // array url gambar tambahan
            $table->json('tools')->nullable(); // array: ["Figma", "Adobe XD"]
            $table->string('project_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};

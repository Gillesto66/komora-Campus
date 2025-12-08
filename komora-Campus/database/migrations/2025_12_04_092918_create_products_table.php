<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['matiere', 'semestre']);
            $table->string('title');
            $table->foreignId('matiere_id')->nullable()->constrained()->onDelete('set null');
            $table->text('description');
            $table->decimal('price_cfa', 10, 2);
            $table->decimal('price_euro', 10, 2)->nullable();
            $table->string('period');                  // ex: '2024-2025'
            $table->boolean('is_corrected');
            $table->string('file_path');
            $table->string('preview_path')->nullable();
            $table->integer('pages_count')->nullable();   // ← ordre correct
            $table->integer('file_size_kb')->nullable();   // ← ordre correct
            $table->enum('diploma', ['BAC', 'BTS'])->nullable(); // ou 'diplome' si tu as renommé
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
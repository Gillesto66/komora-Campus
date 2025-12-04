<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // id (PK, bigint unsigned)
            $table->enum('type', ['matiere', 'semestre']);
            $table->string('title');
            $table->foreignId('matiere_id')->nullable()->constrained()->onDelete('set null');
            $table->text('description');
            $table->decimal('price_cfa', 10, 2);
            $table->decimal('price_euro', 10, 2)->nullable();
            $table->string('period'); // ex. '2020-2023'
            $table->boolean('is_corrected');
            $table->string('file_path');
            $table->string('preview_path')->nullable();
            $table->enum('diplome', ['BAC', 'BTS'])->nullable();
            $table->integer('pages_count')->nullable()->after('preview_path');
            $table->integer('file_size_kb')->nullable()->after('pages_count');
            $table->timestamps(); // created_at, updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
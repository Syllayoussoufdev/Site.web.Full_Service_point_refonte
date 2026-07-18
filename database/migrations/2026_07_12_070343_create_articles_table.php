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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('slug')->unique();
            $table->longText('contenu');
            $table->string('image')->nullable();
            $table->string('categorie')->nullable();
            $table->enum('statut', ['brouillon', 'publié'])->default('brouillon');
            $table->timestamp('date_publication')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};

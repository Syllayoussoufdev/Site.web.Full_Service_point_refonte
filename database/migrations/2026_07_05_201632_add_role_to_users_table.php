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
        Schema::table('users', function (Blueprint $table) {
            // Ajoute une colonne 'role' à la table 'users'
            $table->enum('role', ['editeur', 'admin'])->default('editeur'); // Ajoute une colonne 'role' avec une valeur par défaut 'editeur'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role'); // Supprime la colonne 'role' si la migration est annulée
        });
    }
};

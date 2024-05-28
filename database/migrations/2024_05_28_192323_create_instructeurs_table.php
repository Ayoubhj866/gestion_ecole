<?php

use App\Models\Instructeur;
use App\Models\Matiere;
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
        Schema::create('instructeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('cin');
            $table->string('adresse');
            $table->string('sexe');
            $table->string('tel');
            $table->string('email');
            $table->timestamps();
        });

        // la relatione entre instructeur et matière
        Schema::create('instructeur_matiere', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Instructeur::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Matiere::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructeurs');
        Schema::dropIfExists('instructeur_matiere');
    }
};

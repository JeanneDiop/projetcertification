<?php

use App\Models\Categorie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('image');
            $table->integer('prixU');
            $table->integer('quantitéseuil');
            $table->enum('etat', ['en stock', 'rupture','critique','en cours','terminé'])->default('en stock');
            $table->foreignIdFor(Categorie::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};

//         $table->date('delai');
//         $table->boolean('etat')->default(true);
//         $table->foreignIdFor(TypeProjet::class)->constrained()->cascadeOnDelete();
//         $table->foreignIdFor(EtatProjet::class)->constrained()->cascadeOnDelete(1);
//         $table->timestamps();
//     });
// }


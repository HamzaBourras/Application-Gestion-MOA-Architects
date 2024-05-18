<?php

use App\Models\User;
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
        Schema::create('demandes', function (Blueprint $table) {
            $table->id();
            $table->string("nom_projet");
            $table->string("type");
            $table->string("description");
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->boolean("accepte")->constrained()->nullable();
            $table->boolean("terain_ajoute");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandes');
    }
};
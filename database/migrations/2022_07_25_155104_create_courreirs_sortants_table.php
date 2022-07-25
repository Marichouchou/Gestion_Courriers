<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courreirs_sortants', function (Blueprint $table) {
            $table->id();
            $table->date('date_sortie');
            $table->string('objet');
            $table->string('destinataire');
            $table->string('fichier');

            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('utilisateur_id')
            ->references('id')    
            ->on('utilisateurs')            
            ->onDelete('cascade');

            $table->unsignedBigInteger('courrier_entrant_id');
            $table->foreign('courrier_entrant_id')
            ->references('id')    
            ->on('courreirs_entrants')            
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courreirs_sortants');
    }
};

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
        Schema::create('courreirs_entrants', function (Blueprint $table) {
            $table->id();
            $table->date('date_reception');
            $table->string('objet');
            $table->string('expediteur');
            
            $table->string('fichier');

            $table->unsignedBigInteger('secretaire_id');
            $table->foreign('secretaire_id')
            ->references('id')    
            ->on('secretaire')            
            ->onDelete('cascade');

            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('utilisateur_id')
            ->references('id')    
            ->on('utilisateurs')            
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
        Schema::dropIfExists('courreirs_entrants');
    }
};

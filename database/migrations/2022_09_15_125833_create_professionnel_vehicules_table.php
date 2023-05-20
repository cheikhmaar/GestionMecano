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
        Schema::create('professionnel_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('matricule')->unique();
            $table->string('nomComplet');
            $table->string('sexe');
            $table->string('email')->unique();
            $table->string('adresse');
            $table->string('numeroTelephone')->unique();
            $table->string('status');
            $table->string('photo');
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
        Schema::dropIfExists('professionnel_vehicules');
    }
};

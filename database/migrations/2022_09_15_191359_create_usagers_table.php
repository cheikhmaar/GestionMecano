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
        Schema::create('usagers', function (Blueprint $table) {
            $table->id();
            $table->string('cni');
            $table->string('nomComplet');
            $table->string('sexe');
            $table->string('email')->unique();
            $table->string('adresse');
            $table->string('numeroTelephone')->unique();
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
        Schema::dropIfExists('usagers');
    }
};

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
        Schema::create('licitacao', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_uasg', 100)->nullable(true);
            $table->string('numero_pregao', 100)->nullable(true);
            $table->text('objeto')->nullable(true);
            $table->dateTime('data_proposta')->nullable(true);
            $table->boolean('visualizada')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licitacao');
    }
};

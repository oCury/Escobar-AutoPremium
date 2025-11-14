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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id')->constrained('vehicle_models')->onDelete('cascade');
            $table->foreignId('color_id')->constrained('colors')->onDelete('cascade');
            $table->year('year');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('mileage');
            $table->string('main_photo_url', 2048);
            
            // COLUNAS EXTRAS ADICIONADAS DIRETAMENTE AQUI
            $table->string('photo_url_2', 2048)->nullable();
            $table->string('photo_url_3', 2048)->nullable();

            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
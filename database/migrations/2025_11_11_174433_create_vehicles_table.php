<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();

            // Chave estrangeira CORRIGIDA
            $table->foreignId('model_id')->constrained('vehicle_models')->onDelete('cascade');
            
            $table->foreignId('color_id')->constrained()->onDelete('restrict');
            $table->year('year');

            $table->unsignedInteger('mileage');
            $table->decimal('price', 10, 2);
            $table->text('details')->nullable();
            $table->string('main_photo_url');
            $table->string('photo_url_2')->nullable();
            $table->string('photo_url_3')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
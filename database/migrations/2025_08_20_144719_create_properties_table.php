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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('landlord_id')->constrained('landlords')->onDelete('cascade');
            $table->string('location');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('area')->nullable();
            $table->string('city');
            $table->decimal('rent', 10, 2);
            $table->integer('number_of_rooms');
            $table->integer('number_of_washrooms');
            $table->integer('floor_number');
            $table->integer('balcony');
            $table->string('gas_system');
            $table->string('electricity');
            $table->decimal('service_charge', 10, 2)->nullable();
            $table->string('status')->default('pending'); // Add the status column with default value 'pending'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};

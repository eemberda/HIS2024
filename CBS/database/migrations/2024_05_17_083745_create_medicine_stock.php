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
        Schema::create('medicine_stock', function (Blueprint $table) {
            $table->id();
            $table->integer("unit_cost");
            $table->string("storage_location");
            $table->integer("m_quantity");
            $table->date("expiry_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_stock');
    }
};

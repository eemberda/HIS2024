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
        Schema::create('medicine_detail', function (Blueprint $table) {
            $table->id();
            $table->string("brand_name");
            $table->string("generic_name");
            $table->integer("price");
            $table->string("dosage");
            $table->string("dosage_form");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicine_detail');
    }
};

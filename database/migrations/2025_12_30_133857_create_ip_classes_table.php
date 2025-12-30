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
        Schema::create('ip_classes', function (Blueprint $table) {
            $table->id();
            $table->string('cidr')->unique(); // Es: 192.168.0.0/24
            $table->string('label')->nullable();
            $table->foreignId('vlan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ip_classes');
    }
};

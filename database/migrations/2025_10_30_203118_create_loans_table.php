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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string("reference",50)->unique();
            $table->decimal("ammount",10,2);
            $table->string("term");
            $table->foreignId("client_id")
        ->constrained('clients')
        ->onDelete('cascade')
        ->onUpdate('cascade');
        $table->foreignId("warranty_id")
        ->constrained('warranties')
        ->onDelete('cascade')
        ->onUpdate('cascade');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};

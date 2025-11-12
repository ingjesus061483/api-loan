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
        Schema::create('contact_informations', function (Blueprint $table) {
            $table->id();
            $table->string ("phone_number",50);
            $table ->foreignId("client_id")->constrained("clients")
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId("phone_type_id")
            ->constrained("phone_types")
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_informations');
    }
};

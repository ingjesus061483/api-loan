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
        Schema::create('client_policies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id') ->constrained('clients')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('policy_id') ->constrained('authorization_policies')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->tinyInteger("acept")->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_policies');
    }
};

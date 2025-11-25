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
        Schema::table('client_policies', function (Blueprint $table) {
            $table->foreignId('state_policy_id')
            ->constrained('state_policies')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        $table->dropColumn('acept');
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('client_policies', function (Blueprint $table) {
            //
        });
    }
};

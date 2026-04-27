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
        Schema::table('employment_informations', function (Blueprint $table) {
            $table->after('main_address',function($table){
            $table->foreignId('state_id')->nullable()
            ->constrained('states')
            ->onDelete('cascade')
            ->onUpdate('cascade');});
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employment_informations', function (Blueprint $table) {
            //
        });
    }
};

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
        Schema::table('homework', function (Blueprint $table) {
            $table->after('state_homework_id' , function (Blueprint $table) {
                $table->foreignId('homework_type_id')->constrained('homework_types')->onDelete('cascade')->onUpdate('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('homework', function (Blueprint $table) {
            //
        });
    }
};

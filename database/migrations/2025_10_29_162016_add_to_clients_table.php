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
        Schema::table('clients', function (Blueprint $table) {
            $table->after('email',function($table){
            $table->string("reference",100)->nullable();           
            $table->string ("value_Title",50)->nullable();
            $table ->date("date_birth");
            $table->date ("expedition_date");
            $table->string("neighborhood",50);
            $table->tinyInteger("vehicle")->default(0);
            $table->tinyInteger("estate")->default(0);
            $table->tinyInteger("seizure")->default(0);
        });
            




            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn("reference");           
            $table->dropColumn ("valueTitle");
            $table ->dropColumn("DateBirth");
            $table->dropColumn ("ExpeditionDate");
            $table->dropColumn("neighborhood");
            $table->dropColumn("vehicle");
            $table->dropColumn("estate");
            $table->dropColumn("seizure");
            //
        });
    }
};

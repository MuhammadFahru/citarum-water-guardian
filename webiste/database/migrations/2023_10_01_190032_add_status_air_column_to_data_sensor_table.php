<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_sensor', function (Blueprint $table) {
            $table->string('status_air')->after('data_turbidity')->default('Bersih')->comment('Bersih, Tercemar Kecil, Tercemar Sedang, Tercemar Berat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_sensor', function (Blueprint $table) {
            $table->dropColumn('status_air');
        });
    }
};

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
        Schema::create('vehicle_data', function (Blueprint $table) {
            $table->increments('vd_id');
            $table->string('vd_plat_nomor', 20)->nullable();
            $table->year('vd_tahun')->nullable();
            $table->string('vd_merk', 50)->nullable();
            $table->string('vd_model', 50)->nullable();
            $table->bigInteger('vd_tarif');
            $table->enum('vd_status', ['Y', 'N', 'D'])->default('Y');
            $table->timestamp('vd_created_date')->useCurrent();
            $table->timestamp('vd_updated_date')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_data');
    }
};

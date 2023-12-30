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
        Schema::create('user_data', function (Blueprint $table) {
            $table->increments('ud_id');
            $table->string('ud_nama', 50)->nullable();
            $table->text('ud_alamat', 255)->nullable();
            $table->string('ud_nomor_telepon', 20)->nullable();
            $table->string('ud_nomor_sim', 20)->nullable();
            $table->enum('ud_status', ['Y', 'N', 'D'])->default('D');
            $table->enum('ud_level', ['admin', 'user'])->nullable();
            $table->string('ud_username', 50);
            $table->string('ud_password', 255);
            $table->timestamp('ud_created_date')->useCurrent();
            $table->timestamp('ud_updated_date')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};

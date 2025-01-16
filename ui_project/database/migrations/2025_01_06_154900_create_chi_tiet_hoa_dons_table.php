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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->foreignId('MaHD')->constrained('hoa_dons', 'MaHD')->onDelete('cascade');
            $table->foreignId('MaThuoc')->constrained('thuocs', 'MaThuoc')->onDelete('cascade');
            $table->integer('SoLuong');
            $table->decimal('DonGia', 18, 2);
            $table->decimal('ThanhTien', 18, 2)->nullable();
            $table->primary(['MaHD', 'MaThuoc']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};

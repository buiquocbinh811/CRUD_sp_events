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
        Schema::create('chi_tiet_phieu_nhaps', function (Blueprint $table) {
            $table->foreignId('MaPN')->constrained('phieu_nhaps', 'MaPN');
            $table->foreignId('MaThuoc')->constrained('thuocs', 'MaThuoc');
            $table->integer('SoLuongNhap');
            $table->decimal('DonGiaNhap', 18, 2);
            $table->decimal('ThanhTien', 18, 2)->nullable();
            $table->primary(['MaPN', 'MaThuoc']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phieu_nhaps');
    }
};

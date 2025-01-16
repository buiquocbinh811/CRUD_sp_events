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
        Schema::create('thuocs', function (Blueprint $table) {
            $table->id('MaThuoc');
            $table->string('TenThuoc');
            $table->string('DonViTinh');
            $table->integer('SoLuongTon')->default(0);
            $table->decimal('DonGiaNhap', 18, 2);
            $table->decimal('DonGiaBan', 18, 2);
            $table->date('NgayHetHan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuocs');
    }
};

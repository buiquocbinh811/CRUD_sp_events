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
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Mã sách (primary key)
            $table->string('title'); // Tên sách
            $table->string('author'); // Tác giả
            $table->integer('publication_year'); // Năm xuất bản
            $table->string('genre'); // Thể loại
            $table->unsignedBigInteger('library_id'); // Khóa ngoại liên kết với bảng libraries
            $table->timestamps(); // Thêm cột created_at và updated_at
    
            // Khai báo khóa ngoại
            $table->foreign('library_id')->references('id')->on('librarys')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};

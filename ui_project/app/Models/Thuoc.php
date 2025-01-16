<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Thuoc extends Model
{
    protected $table = 'thuocs';

    protected $primaryKey = 'MaThuoc';

    protected $fillable = [
        'TenThuoc',
        'DonViTinh',
        'SoLuongTon',
        'DonGiaNhap',
        'DonGiaBan',
        'NgayHetHan'
    ];

    // Nếu muốn format dữ liệu
    protected $casts = [
        'NgayHetHan' => 'date',
        'DonGiaNhap' => 'decimal:2',
        'DonGiaBan' => 'decimal:2'
    ];
    public function getNgayHetHanAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function isExpiringSoon()
    {
        $expiryDate = Carbon::parse($this->NgayHetHan);
        $today = Carbon::now();
        $daysUntilExpiry = $today->diffInDays($expiryDate, false);

        return $daysUntilExpiry <= 30 && $daysUntilExpiry > 0;
    }

    public function isExpired()
    {
        return Carbon::parse($this->NgayHetHan)->isPast();
    }

    public function isLowStock()
    {
        return $this->SoLuongTon < 10;
    }
}

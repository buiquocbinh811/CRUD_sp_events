<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Thông Tin Thuốc</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Sửa Thông Tin Thuốc</h1>
    <form action="{{ route('thuocs.update', $thuoc->MaThuoc) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        
        <x-form-input
            type="text"
            name="TenThuoc"
            label="Tên Thuốc"
            :value="$thuoc->TenThuoc"
            required="true"/>
            
        <x-form-input
            type="text"
            name="DonViTinh"
            label="Đơn Vị Tính"
            :value="$thuoc->DonViTinh"
            required="true"/>
            
        <x-form-input
            type="number"
            name="SoLuongTon"
            label="Số Lượng"
            :value="$thuoc->SoLuongTon"
            required="true"/>
            
        <x-form-input
            type="number"
            name="DonGiaNhap"
            label="Đơn Giá Nhập"
            :value="$thuoc->DonGiaNhap"
            required="true"/>
            
        <x-form-input
            type="number"
            name="DonGiaBan"
            label="Đơn Giá Bán"
            :value="$thuoc->DonGiaBan"
            required="true"/>
            
        <x-form-input
            type="date"
            name="NgayHetHan"
            label="Ngày Hết Hạn"
            :value="$thuoc->NgayHetHan"
            required="true"/>

        <button type="submit" class="btn btn-primary">Cập Nhật</button>
        <a href="{{ route('thuocs.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>


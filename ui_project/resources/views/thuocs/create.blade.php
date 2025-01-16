<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Thuốc Mới</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Thêm Thuốc Mới</h1>
    <form action="{{ route('thuocs.store') }}" method="POST" class="mt-4">
        @csrf
        <x-form-input
            type="text"
            name="TenThuoc"
            label="Tên Thuốc"
            required="true"/>
            
        <x-form-input
            type="text"
            name="DonViTinh"
            label="Đơn Vị Tính"
            required="true"/>
            
        <x-form-input
            type="number"
            name="SoLuongTon"
            label="Số Lượng"
            :value="0"
            required="true"/>
            
        <x-form-input
            type="number"
            name="DonGiaNhap"
            label="Đơn Giá Nhập"
            required="true"/>
            
        <x-form-input
            type="number"
            name="DonGiaBan"
            label="Đơn Giá Bán"
            required="true"/>
            
        <x-form-input
            type="date"
            name="NgayHetHan"
            label="Ngày Hết Hạn"
            required="true"/>

        <button type="submit" class="btn btn-primary">Thêm Thuốc</button>
        <a href="{{ route('thuocs.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
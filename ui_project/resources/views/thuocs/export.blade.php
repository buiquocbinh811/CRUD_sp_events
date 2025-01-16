<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xuất Thuốc</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <h1 class="mt-5">Xuất Thuốc: {{ $thuoc->TenThuoc }}</h1>
    
    <div class="card mt-4">
        <div class="card-body">
            <h5>Thông tin thuốc:</h5>
            <p>Số lượng tồn: {{ $thuoc->SoLuongTon }} {{ $thuoc->DonViTinh }}</p>
            <p>Đơn giá bán: {{ number_format($thuoc->DonGiaBan) }} VNĐ</p>
        </div>
    </div>

    <form action="{{ route('thuocs.export.store', $thuoc->MaThuoc) }}" method="POST" class="mt-4">
        @csrf
        <x-form-input
            type="number"
            name="SoLuongExport"
            label="Số Lượng Xuất"
            :value="1"
            required="true"/>

        <button type="submit" class="btn btn-primary">Xuất Hàng</button>
        <a href="{{ route('thuocs.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Hiệu Thuốc</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @foreach($lowStock as $thuoc)
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <strong>Cảnh báo!</strong> Thuốc "{{ $thuoc->TenThuoc }}" sắp hết hàng (còn {{ $thuoc->SoLuongTon }} {{ $thuoc->DonViTinh }}).
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach

    @foreach($expiringSoon as $thuoc)
        <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
            <strong>Cảnh báo!</strong> Thuốc "{{ $thuoc->TenThuoc }}" sẽ hết hạn trong {{ Carbon\Carbon::now()->diffInDays($thuoc->NgayHetHan) }} ngày.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endforeach

    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1>Quản Lý Thuốc</h1>
        <a href="{{ route('thuocs.create') }}" class="btn btn-success">Thêm Thuốc Mới</a>
    </div>

    <x-data-table 
        :items="$thuocs"
        :config="[
            'primary_key' => 'MaThuoc',
            'columns' => [
                'TenThuoc' => ['label' => 'Tên Thuốc'],
                'DonViTinh' => ['label' => 'Đơn Vị'],
                'SoLuongTon' => ['label' => 'Tồn Kho'],
                'DonGiaNhap' => ['label' => 'Giá Nhập'],
                'DonGiaBan' => ['label' => 'Giá Bán'],
                'NgayHetHan' => [
                    'label' => 'Hạn Dùng',
                    'class' => function($item) {
                        return $item->isExpiringSoon() ? 'text-warning' : 
                               ($item->isExpired() ? 'text-danger' : '');
                    }
                ]
            ]
        ]"
        table="thuocs"
    />
</div>
</body>
</html>
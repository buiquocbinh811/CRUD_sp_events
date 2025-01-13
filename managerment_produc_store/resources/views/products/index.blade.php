<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản Lý Sản Phẩm</title>
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

    <div class="d-flex justify-content-between align-items-center mt-5">
        <h1>Quản Lý Sản Phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn btn-success">Thêm Sản Phẩm</a>
    </div>

    <x-data-table 
        :items="$products"
        :config="[
            'primary_key' => 'id',
            'columns' => [
                'product_name' => ['label' => 'Tên Sản Phẩm'],
                'product_description' => ['label' => 'Mô Tả'],
                'product_price' => ['label' => 'Giá'],
                'store.store_name' => ['label' => 'Tên Cửa Hàng'],
                'created_at' => ['label' => 'Ngày Tạo']
            ]
        ]"
        table="products"
    />
</div>
</body>
</html>
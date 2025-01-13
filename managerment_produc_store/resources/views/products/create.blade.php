<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Thêm Sản Phẩm Mới</h1>
        <form action="{{ route('products.store') }}" method="POST" class="mt-4">
            @csrf

            <x-form-input
                type="text"
                name="product_name"
                label="Tên Sản Phẩm"
                required="true" />

            <x-form-input
                type="textarea"
                name="product_description"
                label="Mô Tả" />

            <x-form-input
                type="number"
                name="product_price"
                label="Giá"
                required="true" />
            <!-- / -->

            <div class="mb-3">
                <label for="store_id" class="form-label">Cửa Hàng</label>
                <input type="text"
                    class="form-control @error('store_id') is-invalid @enderror"
                    list="storeList"
                    name="store_id"
                    required>
                <datalist id="storeList">
                    @foreach($stores as $store)
                    <option value="{{ $store->store_name }}">
                        @endforeach
                </datalist>
                @error('store_id')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <!--  -->
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>
<!-- <x-form-input
            type="text" 
            name="store_id"
            label="Cửa Hàng"
            required="true"/> -->
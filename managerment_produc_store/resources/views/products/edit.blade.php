<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa Thông Tin Sản Phẩm</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Sửa Thông Tin Sản Phẩm</h1>
        <form action="{{ route('products.update', $product->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')

            <x-form-input
                type="text"
                name="product_name"
                label="Tên Sản Phẩm"
                :value="$product->product_name"
                required="true" />

            <x-form-input
                type="textarea"
                name="product_description"
                label="Mô Tả"
                :value="$product->product_description" />

            <x-form-input
                type="number"
                name="product_price"
                label="Giá"
                :value="$product->product_price"
                required="true" />
            <div class="mb-3">
                <label for="store_id" class="form-label">Cửa Hàng</label>
                <input type="text"
                    class="form-control @error('store_id') is-invalid @enderror"
                    list="storeList"
                    name="store_id"
                    value="{{ $product->store->store_name }}"
                    required>
                <datalist id="storeList">
                    @foreach($stores as $store)
                    <option value="{{ $store->store_name }}">
                        @endforeach
                </datalist>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>

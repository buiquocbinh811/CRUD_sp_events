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
        <!-- enctype="multipart/form-data" -->
        <form action="{{ route('pets.update', $pet->id) }}" method="POST" class="mt-4" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-form-input
                type="text"
                name="pet_name"
                label="Tên Thú Cưng"
                :value="$pet->pet_name"
                required="true" />

            <x-form-input
                type="text"
                name="pet_species"
                label="Loài"
                :value="$pet->pet_species" />

            <x-form-input
                type="text"
                name="pet_breed"
                label="Giống"
                :value="$pet->pet_breed" />


            <x-form-input
                type="number"
                name="pet_age"
                label="Tuổi"
                :value="$pet->pet_age"
                required="true" />
            <div class="mb-3">
                <label for="owner_id" class="form-label">Cửa Hàng</label>
                <input type="text"
                    class="form-control @error('owner_id') is-invalid @enderror"
                    list="ownerList"
                    name="owner_id"
                    value="{{ $pet->owner->owner_name }}"
                    required>
                <datalist id="ownerList">
                    @foreach($owners as $owner)
                    <option value="{{ $owner->owner_name }}">
                        @endforeach
                </datalist>
            </div>

            <button type="submit" class="btn btn-primary">Cập Nhật</button>
            <a href="{{ route('pets.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Thêm Thú Cưng</title>
    <link rel="stylesheet" href="/all.min.css">
    <link rel="stylesheet" href="/bootstrap.min.css">
    <script src="/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Thêm Thú Cưng Mới</h1>
        <form action="{{ route('pets.owner') }}" method="POST" class="mt-4" ">
            @csrf

            <x-form-input
                type=" text"
            name="pet_name"
            label="Tên Thú Cưng"
            required="true" />

        <x-form-input
            type="text"
            name="pet_species"
            label="Loài" />

        <x-form-input
            type="text"
            name="pet_breed"
            label="Giống" />

        <x-form-input
            type="number"
            name="pet_age"
            label="Tuổi"
            required="true" />

        <div class="mb-3">
            <label for="owner_id" class="form-label">Chủ thú cưng</label>
            <input type="text"
                class="form-control @error('owner_id') is-invalid @enderror"
                list="ownerList"
                name="owner_id"
                required>
            <datalist id="ownerList">
                @foreach($owners as $owner)
                <option value="{{ $owner->owner_name }}">
                    @endforeach
            </datalist>
            @error('owner_id')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        <a href="{{ route('pets.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>

</html>
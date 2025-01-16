<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản Lý Thú Cưng</title>
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
            <h1>Quản Lý Thú Cưng</h1>
            <a href="{{ route('pets.create') }}" class="btn btn-success">Thêm Sản Phẩm</a>
        </div>

        <x-data-table
            :items="$pets"
            :config="[
            'primary_key' => 'id',
            'columns' => [
                'pet_name' => ['label' => 'Tên Thú Cưng'],
                'pet_species' => ['label' => 'Loài'],
                'pet_breed' => ['label' => 'Giống'],

                'pet_age' => ['label' => 'Tuối thú cưng'],

                'owner.owner_name' => ['label' => 'Chủ sở hữu'],
            ]
        ]"
            table="pets" />
    </div>
</body>

</html>
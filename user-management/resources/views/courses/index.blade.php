<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý khóa học</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ route('courses.index') }}">Quản lý khóa học</a>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <h2>Danh sách khóa học</h2>
        <a href="{{ route('courses.create') }}" class="btn btn-success mb-3">Thêm khóa học mới</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên khóa học</th>
                    <th>Mô tả</th>
                    <th>Độ khó</th>
                    <th>Giá</th>
                    <th>Ngày bắt đầu</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ Str::limit($course->description, 100) }}</td>
                    <td>
                        @switch($course->difficulty)
                        @case('beginner')
                        Cơ bản
                        @break
                        @case('intermediate')
                        Trung cấp
                        @break
                        @case('advanced')
                        Nâng cao
                        @break
                        @endswitch
                    </td>
                    <td>{{ number_format($course->price) }} VNĐ</td>
                    <td>{{ $course->start_date->format('d/m/Y') }}</td>
                    <!--td của actions -->
                    <td>
                        <a href="{{ route('courses.edit', ['id' => $course->id]) }}" class="btn btn-sm btn-primary">Sửa</a>
                        <form action="{{ route('courses.destroy', ['id' => $course->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Bạn có chắc muốn xóa khóa học này?')">Xóa</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-4">
            {{ $courses->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
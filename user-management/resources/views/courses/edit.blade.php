<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa khóa học</title>
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

        <h2>Chỉnh Sửa Khóa Học</h2>
        <form action="{{ route('courses.update', ['id' => $course->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Tên khóa học</label>
                <input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Mô tả</label>
                <textarea name="description" class="form-control" rows="3" required>{{ $course->description }}</textarea>
            </div>
            <div class="mb-3">
                <label>Độ khó</label>
                <select name="difficulty" class="form-control" required>
                    <option value="beginner" {{ $course->difficulty == 'beginner' ? 'selected' : '' }}>Cơ bản</option>
                    <option value="intermediate" {{ $course->difficulty == 'intermediate' ? 'selected' : '' }}>Trung cấp</option>
                    <option value="advanced" {{ $course->difficulty == 'advanced' ? 'selected' : '' }}>Nâng cao</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Giá</label>
                <input type="number" name="price" value="{{ $course->price }}" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
                <label>Ngày bắt đầu</label>
                <input type="date" name="start_date" value="{{ $course->start_date->format('Y-m-d') }}" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
</head>
<body>
    <!-- Navbar -->
    <nav style="background-color: cornflowerblue !important;" class="navbar navbar-expand-lg">
        <div  class="container-fluid">
            <a style="margin-left: 100px; margin-top: 10px" class="navbar-brand h1" href="{{ route('posts.index') }}">CRUD Post</a>
            <div class="justify-content-end">
                <a class="btn btn-sm btn-success" style="margin-right: 40px;" href="{{ route('posts.create') }}">Add Post</a>
            </div>
        </div>
    </nav>
    <!-- Posts List -->
    <div class="container mt-5">
        <h2 class="mb-4">List Posts</h2>
        <table class="table table-bordered table-striped">
            <thead style="background-color: cyan !important">
                <tr>
                    <th>#</th>
                    <th >Title</th>
                    <th>Content</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->content }}</td>
                        <td>
                            <a style="width: 60px" href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76A2Jn7Kv/VWIYvBrFpDUsIaSnCdT90sN8mcqH5StRnPpLVn68fqmjR/ZV+EkH+"
            crossorigin="anonymous"></script>
</body>
</html>
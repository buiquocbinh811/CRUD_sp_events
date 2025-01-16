<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                @foreach($config['columns'] as $key => $column)
                <th>{{ $column['label'] }}</th>
                @endforeach
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

            @foreach($items as $item)
            <tr>
                <td>{{ $item->{$config['primary_key']} }}</td>
                @foreach($config['columns'] as $key => $column)
                <td>
                    @if(str_contains($key, '.'))
                    @php
                    $keys = explode('.', $key);
                    $value = $item;
                    foreach($keys as $k) {
                    $value = $value->{$k};
                    }
                    @endphp
                    {{ $value }}
                    @else
                    {{ $item->{$key} }}
                    @endif
                </td>
                @endforeach
                <td>
                    <a href="{{ route('products.edit', $item->{$config['primary_key']}) }}"
                        class="btn btn-primary btn-sm">Sửa</a>
                    <form action="{{ route($table.'.destroy', $item->{$config['primary_key']}) }}"
                        method="POST"
                        style="display:inline;"
                        onsubmit="return confirm('Bạn có chắc muốn xóa?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(method_exists($items, 'links'))
    <div class="d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
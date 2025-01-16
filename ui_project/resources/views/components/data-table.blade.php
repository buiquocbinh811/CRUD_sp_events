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
                <td>{{ $item->$key }}</td>
                @endforeach
                <td>
                    <a href="{{ route('thuocs.edit', $item->{$config['primary_key']}) }}"
                        class="btn btn-primary btn-sm">Sửa</a>
                    <a href="{{ route('thuocs.export', $item->{$config['primary_key']}) }}"
                        class="btn btn-warning btn-sm">Xuất Hàng</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(method_exists($items, 'links'))
    <div class="d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-4') }}
    </div>
    @endif
</div>
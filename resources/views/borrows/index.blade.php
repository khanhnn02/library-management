<!-- resources/views/borrows/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách Mượn Sách</h1>
    <a href="{{ url('/borrows/create') }}" class="btn btn-primary">Thêm mới mượn sách</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Độc giả</th>
                <th>Sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->id }}</td>
                    <td>{{ $borrow->reader->name }}</td>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>{{ $borrow->status == 1 ? 'Chưa trả' : 'Đã trả' }}</td>
                    <td>
                        <a href="{{ url('/borrows/' . $borrow->id . '/edit') }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ url('/borrows/' . $borrow->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

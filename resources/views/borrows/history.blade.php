<!-- resources/views/borrows/history.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Lịch sử Mượn Sách của {{ $reader->name }}</h1>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Ngày trả</th>
                <th>Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($borrows as $borrow)
                <tr>
                    <td>{{ $borrow->book->name }}</td>
                    <td>{{ $borrow->borrow_date }}</td>
                    <td>{{ $borrow->return_date }}</td>
                    <td>{{ $borrow->status ? 'Đã trả' : 'Chưa trả' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ url('/readers') }}" class="btn btn-secondary">Quay lại</a>
</div>
@endsection

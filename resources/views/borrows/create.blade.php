<!-- resources/views/borrows/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm mới Mượn Sách</h1>

    <form action="{{ url('/borrows') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="reader_id">Độc giả</label>
            <select class="form-control" id="reader_id" name="reader_id" required>
                @foreach ($readers as $reader)
                    <option value="{{ $reader->id }}">{{ $reader->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="book_id">Sách</label>
            <select class="form-control" id="book_id" name="book_id" required>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_date">Ngày mượn</label>
            <input type="date" class="form-control" id="borrow_date" name="borrow_date" required>
        </div>

        <div class="form-group">
            <label for="return_date">Ngày trả (dự kiến)</label>
            <input type="date" class="form-control" id="return_date" name="return_date" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
</div>
@endsection

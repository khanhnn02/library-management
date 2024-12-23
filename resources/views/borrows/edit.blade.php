@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Cập nhật thông tin mượn sách</h2>
    <form action="{{ url('borrows/' . $borrow->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="book_id">Sách</label>
            <select name="book_id" id="book_id" class="form-control">
                @foreach($books as $book)
                <option value="{{ $book->id }}" {{ $borrow->book_id == $book->id ? 'selected' : '' }}>
                    {{ $book->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="reader_id">Độc giả</label>
            <select name="reader_id" id="reader_id" class="form-control">
                @foreach($readers as $reader)
                <option value="{{ $reader->id }}" {{ $borrow->reader_id == $reader->id ? 'selected' : '' }}>
                    {{ $reader->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="borrow_date">Ngày mượn</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" value="{{ $borrow->borrow_date }}">
        </div>

        <div class="form-group">
            <label for="return_date">Ngày trả</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $borrow->return_date }}">
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ $borrow->status == 1 ? 'selected' : '' }}>Chưa trả</option>
                <option value="0" {{ $borrow->status == 0 ? 'selected' : '' }}>Đã trả</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
@endsection

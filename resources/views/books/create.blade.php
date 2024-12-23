<!-- resources/views/books/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Thêm mới Sách</h1>

    <form action="{{ url('/books') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Tên sách</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="author">Tác giả</label>
            <input type="text" class="form-control" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="category">Thể loại</label>
            <input type="text" class="form-control" id="category" name="category" required>
        </div>

        <div class="form-group">
            <label for="year">Năm xuất bản</label>
            <input type="number" class="form-control" id="year" name="year" required>
        </div>

        <div class="form-group">
            <label for="quantity">Số lượng bản sao</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <button type="submit" class="btn btn-success">Thêm mới</button>
    </form>
</div>
@endsection

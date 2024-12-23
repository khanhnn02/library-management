<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    $books = Book::all();
    return view('books.index', compact('books'));
}

public function create()
{
    return view('books.create');
}

public function store(Request $request)
{
    Book::create($request->all());
    return redirect()->route('books.index')->with('success', 'Thêm sách thành công!');
}

public function edit($id)
{
    $book = Book::findOrFail($id);
    return view('books.edit', compact('book'));
}

public function update(Request $request, $id)
{
    $book = Book::findOrFail($id);
    $book->update($request->all());
    return redirect()->route('books.index')->with('success', 'Cập nhật sách thành công!');
}

public function destroy($id)
{
    Book::destroy($id);
    return redirect()->route('books.index')->with('success', 'Xóa sách thành công!');
}

}

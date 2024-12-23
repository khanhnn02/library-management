<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reader;


class BorrowController extends Controller
{
    
    public function index()
    {
        $borrows = Borrow::with(['book', 'reader'])->get();
        return view('borrows.index', compact('borrows'));
    }

    
    public function create()
    {
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.create', compact('books', 'readers'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'reader_id' => 'required|exists:readers,id',
            'book_id' => 'required|exists:books,id',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);

        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success', 'Thêm thông tin mượn sách thành công!');
    }

   
    public function edit($id)
    {
        $borrow = Borrow::findOrFail($id);
        $books = Book::all();
        $readers = Reader::all();
        return view('borrows.edit', compact('borrow', 'books', 'readers'));
    }

    
    public function update(Request $request, $id)
{
    $request->validate([
        'book_id' => 'required|exists:books,id',
        'reader_id' => 'required|exists:readers,id',
        'borrow_date' => 'required|date',
        'return_date' => 'required|date|after_or_equal:borrow_date',
        'status' => 'required|boolean', 
    ]);

    $borrow = Borrow::findOrFail($id);

    $borrow->update([
        'book_id' => $request->book_id,
        'reader_id' => $request->reader_id,
        'borrow_date' => $request->borrow_date,
        'return_date' => $request->return_date,
        'status' => $request->status, 
    ]);

    return redirect()->route('borrows.index')->with('success', 'Thông tin mượn sách đã được cập nhật!');
}



   
    public function destroy($id)
    {
        Borrow::destroy($id);
        return redirect()->route('borrows.index')->with('success', 'Xóa thông tin mượn sách thành công!');
    }


    public function readerHistory($id)
    {
        $reader = Reader::findOrFail($id);
        $borrows = Borrow::where('reader_id', $id)->with('book')->get();
        return view('borrows.history', compact('reader', 'borrows'));
    }
}

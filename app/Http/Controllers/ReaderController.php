<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    
    public function index()
    {
        $readers = Reader::all();
        return view('readers.index', compact('readers'));
    }

    
    public function create()
    {
        return view('readers.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        Reader::create($request->all());
        return redirect()->route('readers.index')->with('success', 'Thêm độc giả thành công!');
    }

    
    public function edit($id)
    {
        $reader = Reader::findOrFail($id);
        return view('readers.edit', compact('reader'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);

        $reader = Reader::findOrFail($id);
        $reader->update($request->all());
        return redirect()->route('readers.index')->with('success', 'Cập nhật độc giả thành công!');
    }

    
    public function destroy($id)
    {
        Reader::destroy($id);
        return redirect()->route('readers.index')->with('success', 'Xóa độc giả thành công!');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{

    use HasFactory;

    protected $fillable = [
        'book_id',
        'reader_id',
        'borrow_date',
        'return_date',
        'status',
    ];
    
    public function getStatusTextAttribute()
    {
        return $this->status == 1 ? 'Chưa trả' : 'Đã trả';
    }
    
    public function book()
{
    return $this->belongsTo(Book::class);
}

public function reader()
{
    return $this->belongsTo(Reader::class);
}

}

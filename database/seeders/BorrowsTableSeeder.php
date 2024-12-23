<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Borrow;
use App\Models\Book;
use App\Models\Reader;
use Faker\Factory as Faker;

class BorrowsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $bookIds = Book::pluck('id')->toArray();
        $readerIds = Reader::pluck('id')->toArray();

        foreach (range(1, 30) as $index) {
            Borrow::create([
                'reader_id' => $faker->randomElement($readerIds),
                'book_id' => $faker->randomElement($bookIds),
                'borrow_date' => $faker->date,
                'return_date' => $faker->date,
                'status' => $faker->boolean,
            ]);
        }
    }
}

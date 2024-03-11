<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Store;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $book = Book::create([
            'name' => 'El alquimista',
            'author' => 'Paulo Coelho',
            'year' => '1988',
        ]);
        $book1 = Book::create([
            'name' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'year' => '1967',
        ]);
        $book2 = Book::create([
            'name' => 'Don Quijote de la Mancha',
            'author' => 'Miguel de Cervantes',
            'year' => '1605',
        ]);
        $book3 = Book::create([
            'name' => '1984',
            'author' => 'George Orwell',
            'year' => '1949',
        ]);
        $book4 = Book::create([
            'name' => 'Matar a un ruiseñor',
            'author' => 'Harper Lee',
            'year' => '1960',
        ]);
        $book5 = Book::create([
            'name' => 'Orgullo y prejuicio',
            'author' => 'Jane Austen',
            'year' => '1813',
        ]);
        $book6 = Book::create([
            'name' => 'El señor de los anillos',
            'author' => 'J.R.R. Tolkien',
            'year' => '1954',
        ]);

        $list [] = $book;
        $list [] = $book1;
        $list [] = $book2;
        $list [] = $book3;
        $list [] = $book4;
        $list [] = $book5;
        $list [] = $book6;

        $store = Store::find(1);

        if($store)
        {
            foreach($list as $book)
            {
                $price = rand(50, 1000);
                $cant = rand(70, 100);
                $book->stores()->attach($store->id, ['state' =>'available', 'number of book' => $cant, 'price' => $price ]);
            }
        }

    }
}

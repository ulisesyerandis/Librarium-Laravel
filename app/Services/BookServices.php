<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Book;
use App\Services;

class BookServices 
{
    public function __construct()
    {}

    // to know if the exist in the DB
    public function exist(Book $book)
    {
        $existingBook = Book::where('name', $book->name)->first();
        if(!$existingBook)
        {
            return response()->json(['message' => 'Book does not exist'], 404);
        }
        return $existingBook;
    }

    //      CRUD function  -- INDEX(GET) (get all book)
    public function index()
    {
        $book = Book::all();
        return $book;
    }

    //      CRUD function  -- STORE(POST) (create a new book)
    public function store(Request $request, $store_id)
    {
        $book = Book::create([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'year' => $request->input('year')
        ]);

        $result = $this->exist($book);

        if(isset($result->original['message']) && $result->getStatusCode() == 404)
        {
             // add the book to the pivot table book_store(by relachionship *-*)
        $store = Store::find($store_id);

        if($store)
        {
            $book->save();
            $price = rand(50, 1000);
            $cant = rand(70, 100);
            $book->stores()->attach($store->id, ['state' =>'available', 'number of book' => $cant, 'price' => $price ]);
        }
        return $book;
        }else{
            $message = 'book already exist';
            return $message;
        }       
    }

    //      CRUD function  -- SHOW(GET($id)) (get a book by id)
    public function show($id)
    {
        $book = Book::find($id);

        if(!$book)
        {
            // return response()->json(['message' => 'book not found'], 404);
            $message = 'book not found';
            return $message;
        }
        return $book;
    }
     //      CRUD function -- update(PUT) (update book by $id)
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if(!$book)
        {
            // return response()->json(['message' => 'book not found'], 404);
            $message = 'book not found';
            return $message;
        }

        $book->update([
            'name' => $request->input('name'),
            'author' => $request->input('author'),
            'year' => $request->input('year'),
        ]);

        $book->save();
        return $book;
    }
     //      CRUD function -- DELETE  (delete an book by $id)
    public function destroy($id, $store_id)
    {
        $book = Book::find($id);

        if(!$book)
        {
            // return response()->json(['message' => 'book not found'], 404);
            $message = 'bool not found';
            return $message;
        }

        // destroy the book to the pivot table book_store(by relachionship *-*)
        $store = Store::find($store_id);
        if($store)
        {
            $book->stores()->detach($store->id);
        }

        $bookDeleted = $book;
        $book->delete();
        return $bookDeleted;
    }
}
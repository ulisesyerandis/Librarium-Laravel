<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Models\Book;
use App\Models\Sale;
use App\Services;

class SaleServices 
{
    public function __construct()
    {}


    //      CRUD function  -- INDEX(GET) (get all sale)
    public function index()
    {
        $sale = Sale::all();
        return $sale;
    }

    //      CRUD function  -- STORE(POST) (create a new sale)
    public function store($store_id, $user_id, $book_id)
    {
        $store = Store::find($store_id);
        $user = User::find($user_id);
        $book = Book::find($book_id);

        if($store && $user && $book)
        {
            $sale = Sale::create([
            'store_id' => $store_id,
            'user_id' => $user_id,
            'book_id' => $book_id,
        ]);

        return $sale;
        }

        $mesage = 'error with the store or the user or book ';
        return $mesage;      
    }

    //      CRUD function  -- SHOW(GET($id)) (get a sale by id)
    public function show($id)
    {
        $sale = Sale::find($id);

        if(!$sale)
        {
            $mesage = 'error with the sale';
            return $mesage;
        }
        return $sale;
    }
     //      CRUD function -- update(PUT) (update sale by $id)
    public function update($sale_id, $store_id, $user_id, $book_id)
    {
        $sale = Sale::find($sale_id);

        if(!$sale)
        {
            $mesage = 'sale does not exist';
            return $mesage;
        }

        $sale->update([
            'store_id' => $store_id,
            'user_id' => $user_id,
            'book_id' => $book_id,
        ]);
        $sale->save();
        return $sale;
    }
     //      CRUD function -- DELETE  (delete an sale by $id)
    public function destroy($id)
    {
        $sale = Sale::find($id);

        if(!$sale)
        {
            $mesage = 'sale does not exist';
            return $mesage;
        }

        $saleDeleted = $sale;
        $sale->delete();
        return $saleDeleted;
    }
}
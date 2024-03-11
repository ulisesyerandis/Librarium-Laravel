<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\BookServices;
use App\Models\Book;

class BookController extends Controller
{

    protected $bookService;

    public function __construct(BookServices $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->bookService->index());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $store_id)
    {
        $book = new Book();
        $book = $this->bookService->store($request, $store_id);
        return response()->json($book);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = new Book();
        $book = $this->bookService->show($id);
        return response()->json($book);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = new Book();
        $book = $this->bookService->update($request, $id);
        return response()->json($book);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, $store_id)
    {
        $book = new Book();
        $book = $this->bookService->destroy($id, $store_id);
        return response()->json($book);
    }
}

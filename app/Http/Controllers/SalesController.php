<?php

namespace App\Http\Controllers;

use App\Services\SaleServices;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    protected $saleServices;

    public function __construct(SaleServices $saleServices) 
    { 
        $this->saleServices = $saleServices;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->saleServices->index());
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
    public function store($store_id, $user_id, $book_id)
    {
        return response()->json($this->saleServices->store($store_id, $user_id, $book_id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json($this->saleServices->show($id));
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
    public function update($sale_id, $store_id, $user_id, $book_id)
    {
        return response()->json($this->saleServices->update($sale_id, $store_id, $user_id, $book_id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return response()->json($this->saleServices->destroy($id));
    }
}

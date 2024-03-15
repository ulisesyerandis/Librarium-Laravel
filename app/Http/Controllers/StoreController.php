<?php

namespace App\Http\Controllers;

use App\Services\StoreServices;
use Illuminate\Http\Request;
use App\Models\Store;

class StoreController extends Controller
{

    protected $storeService;

    public function __construct(StoreServices $storeService)
    {
        $this->storeService = $storeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->storeService->index());
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
    public function store(Request $request)
    {
        $store = new Store();
        $store = $this->storeService->store($request);
        return response()->json($store);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $store = new Store();
        $store = $this->storeService->show($id);
        return response()->json($store);
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
        $store = new Store();
        $store = $this->storeService->update($request, $id);
        return response()->json($store);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $store = new Store();
        $store = $this->storeService->destroy($id);
        return response()->json($store);
    }
    ///////////////////////////////////////////////////////////////////

    // public function copiesSold()
    // {

    // }
}

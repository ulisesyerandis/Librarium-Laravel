<?php

namespace App\Http\Controllers;

use App\Services\UserServices;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    protected $userService;

    public function __construct(UserServices $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->userService->index());
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
        $user = new User();
        $user = $this->userService->store($request, $store_id);
        
        return \response()->json($user);
        // return response()->json($this->userService->store($request, $store_id));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = new User();
        $user = $this->userService->show($id);
        return \response()->json($user);
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
        $user = new User();
        $user = $this->userService->update($request, $id);
        return \response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id, $store_id)
    {
        $user = new User();
        $user = $this->userService->destroy($id, $store_id);
        return \response()->json($user);
    }
    ////////////////////////////////////////////////////////////////////

    // En el controlador donde se registra la compra del libro por parte del usuario
public function purchaseBook(Request $request, $user)
{
    // $user = Auth::user(); // Obtener el usuario autenticado
    $user = User::find($user->id);
    $bookId = $request->input('book_id');
    // Lógica para registrar la compra del libro por parte del usuario
            // metodo en desarrollo
    // Incrementar el contador de compra del libro para el usuario actual
    $user->incrementBookPurchaseCount();

    return response()->json(['message' => 'Book purchased successfully'], 200);
}

}

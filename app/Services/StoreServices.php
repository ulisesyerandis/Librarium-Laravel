<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Services;

class StoreServices 
{
    public function __construct()
    {}

    public function exist(Store $store)
    {
        $existingStore = Store::where('name', $store->name)->first();
        if(!$existingStore)
        {
            return response()->json(['message' => 'Store does not exist'], 404);
        }
        return $existingStore;
    }

    //      CRUD function  -- INDEX(GET) (get all store)
    public function index()
    {
        $store = Store::all();
        return $store;
    }

    //      CRUD function  -- STORE(POST) (create a new store)
    public function store(Request $request)
    {
        $store = new Store();
        $store->name = $request->input('name');

        $store = Store::create([
            'name' => $request->input('name'),
        ]);

        $result = $this->exist($store);
        if(isset($result->original['message']) && $result->getStatusCode() == 404) 
        {
            $store->save();
            return $store; 
        }else{
            $message = 'store already exists'; 
            return $message;
        }       
    }

    //      CRUD function  -- SHOW(GET($id)) (get a store by id)
    public function show($id)
    {
        $store = Store::find($id);
        if(!$store)
        {
            // return response()->json(['message' => 'Store not found'], 404);
            $message = 'store not found';
            return $message;
        }
        return $store;
    }

    //      CRUD function -- update(PUT) (update store by $id)
    public function update(Request $request, $id)
    {
        $store = Store::find($id);
        if(!$store)
        {
            // return response()->json(['message' => 'Store not found'], 404 );
            $message = 'store not found';
            return $message;
        }

        $store->update([
            'name' => $request->input('name'),
        ]);

        $store->save();
        return $store;
    }

     //      CRUD function -- DELETE  (delete a store by $id)
     public function destroy($id)
     {
        $store = Store::find($id);
        if(!$store)
        {
            // return response()->json(['message' => 'Store not found'], 404);
            $message = 'store not found';
            return $message;
        }

        $store->destroyStoreUserRelation();

        $storeDeleted = $store;
        $store->delete();
        return $storeDeleted;
     }
}
<?php 

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Store;
use App\Services;

class UserServices 
{
    public function __construct()
    {}

    public function exist(User $user)
    {
        $existingUser = User::where('email', $user->email)->first();
        if(!$existingUser)
        {
            return response()->json(['message' => 'User does not exist'], 404);
        }
        return $existingUser;
    }

    //      CRUD function  -- INDEX(GET) (get all user)
    public function index()
    {
        $user = User::all();
        return $user;
    }

    //      CRUD function  -- STORE(POST) (create a new user)
    public function store(Request $request, $store_id)
    {        
        $user = User::create([
            'name'=> $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);        

        $result = $this->exist($user);
        // i checkout the answer of the exist method (if is a error message and 404 code error)
        if(isset($result->original['message']) && $result->getStatusCode() == 404)
        {
                 // add the user to the pivot table store_user(by relachionship *-*)
            $store = Store::find($store_id);
            if($store)
            {
                $user->save();
                $user->stores()->attach($store->id, ['role' => 'user']);
            }
            return $user;
        }else{
            $message = 'user already exists';
            // return response()->json(['message' =>'user already exists']);
            return $message;
        }       
    }

     //      CRUD function  -- SHOW(GET($id)) (get a user by id)
     public function show($id)
     {
        $user = User::find($id);

        if(!$user)
        {
            $message = 'user not found';
            return $message;
            // return response()->json(['message' => 'User not found'], 404);
        }
        return $user;
     }

     //      CRUD function -- update(PUT) (update user by $id)
     public function update(Request $request, $id)
     {
        $user = User::find($id);

        if(!$user)
     {
        // return response()->json(['message'=>'User not found'], 404 );
        $message = 'user not found';
            return $message;
     }

     $user->update([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
     ]);
     
     $user->save();
     return $user;
     }

     //      CRUD function -- DELETE  (delete an user by $id)
     public function destroy($id, $store_id)
     {
        $user = User::find($id);
        
        if(!$user)
        {
            // return response()->json(['message'=>'User not found'],404);
            $message = 'user not found';
            return $message;
        }

        // destroy the user to the pivot table store_user(by relachionship *-*)
        $store = Store::find($store_id);
        if($store)
        {
            $user->stores()->detach($store->id);
        }

        $userDeleted = $user;
        $user->delete();
        return $userDeleted;
     }
}
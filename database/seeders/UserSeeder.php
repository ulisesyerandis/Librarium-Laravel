<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Store;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'jhay C',    
            'email' => 'jhay@email.com',
            'password' => '1234',
        ]);

        $user1 = User::create([
            'name' => 'yoyo',    
            'email' => 'yoyo@email.com',
            'password' => '1234',
        ]);
        $user2 = User::create([
            'name' => 'kevin',    
            'email' => 'k@email.com',
            'password' => '1234',
        ]);

        $user3 = User::create([
            'name' => 'adrian',    
            'email' => 'ad@email.com',
            'password' => '1234',
        ]);

        $list[] = $user;
        $list[] = $user1;
        $list[] = $user2;
        $list[] = $user3;
        $store = Store::find(1);

        if($store)
        {
            foreach($list as $user)
            {
                 $user->stores()->attach($store->id, ['role' => 'user']);
            }
           
        }
    }
}

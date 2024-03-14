<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $table = 'users';
    protected $primaryKey = 'id';

        // Relacion de mucho a mucho (store - users)
    public function stores()
    {
        return $this->belongsToMany(Store::class,'store_user')->withPivot('book_purchase_count');
    }

    //  Relacion de mucho a mucho (book - users) 
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_user');
    }

    //  Contador de libros comprados por el usuario
    public function incrementBookPurchaseCount()
    {
        $this->bookPurchaseCount++;
        $this->save();
    }

//     public function incrementBookPurchaseCount($storeId)
//     {
//         $store = $this->stores()->where('store_id', $storeId)->first();
//         if ($store) {    
//             $pivot = $store->pivot;
//             $pivot->book_purchase_count++;
//             $pivot->save();
//         }
// }
}
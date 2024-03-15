<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

      protected $table = 'stores';
      protected $primaryKey = 'id';

    // Relacion mucho a mucho (store - user)
    public function users()
    {
        // return $this->belongsToMany('App\Models\User');
        return $this->belongsToMany(User::class, 'store_user');
        
    }

    // Relacion de mucho a mucho (book - store)
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_store');
    }

    //  recorre todas las relaciones de usuario asociadas a esta tienda y las elimine de la tabla store_user
    public function destroyStoreUserRelation()
{
    $this->users()->detach();
}

public function sales()
{
    return $this->hasMany(Sale::class);
}

}

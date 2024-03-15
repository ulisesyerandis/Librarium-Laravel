<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'author',
        'year',
    ];

    protected $table = 'books';
    protected $primaryKey = 'id';

        // Relacion mucho a mucho (book - user)
        public function users()
        {
            return $this->belongsToMany(User::class, 'book_user');
        }

        //  Relacion de mucho a mucho (book - store)
        public function stores()
        {
            return $this->belongsToMany(Store::class, 'book_store');
        }

        // many_to_one with sales
        public function sales()
        {
            return $this->hasMany(Sale::class);
        }
}

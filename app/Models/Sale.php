<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'store_id',
        'user_id',
        'book_id',
    ];

    protected $table = 'sale';
    protected $primaryKey = 'id';

        // many_to_one
    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    // many_to_one
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // many_to_one
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

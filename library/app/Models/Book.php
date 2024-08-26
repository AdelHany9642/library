<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'author', 'category', 'price', 'quantity'];

    public function BorrowedBook(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BorrowedBook::class);
    }
}

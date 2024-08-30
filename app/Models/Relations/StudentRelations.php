<?php

namespace App\Models\Relations;

use App\Models\Book;
use App\Models\BorrowedBook;

trait StudentRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function borrowedBooks()
    {
        return $this->belongsToMany(Book::class, 'book_user')
                ->using(BorrowedBook::class)
                ->withPivot(['due_date', 'returned_at'])
                ->withTimestamps();
    }
}

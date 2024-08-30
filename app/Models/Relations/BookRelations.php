<?php

namespace App\Models\Relations;

use App\Models\BorrowedBook;
use App\Models\Student;

trait BookRelations
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function students()
    {
        return $this->belongsToMany(Student::class, 'book_user')
                    ->using(BorrowedBook::class)
                    ->withPivot(['due_date', 'returned_at'])
                    ->withTimestamps();
    }
}

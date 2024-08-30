<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BorrowedBook extends Pivot
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'returned_at' => 'datetime',
            'due_date' => 'datetime',
        ];
    }

    /**
     * Determine whether the book has been returned.
     *
     * @return boolean
     */
    public function isReturned(): bool
    {
        return !!$this->returned_at;
    }

    /**
     * Determine whether the book return date is past due.
     *
     * @return boolean
     */
    public function isPastDue(): bool
    {
        return $this->due_date->isPast();
    }
}

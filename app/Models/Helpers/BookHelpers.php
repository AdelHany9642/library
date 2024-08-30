<?php

namespace App\Models\Helpers;

use App\Models\User;

trait BookHelpers
{
    /**
     * @return int
     */
    public function getBorrowsCount()
    {
        return $this->students()->whereNull('returned_at')->count();
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity - $this->getBorrowsCount();
    }

    /**
     * @return boolean
     */
    public function hasBeenBorrowedBy(User $user)
    {
        return $this->students()
                    ->where('user_id', $user->getKey())
                    ->whereNull('returned_at')
                    ->exists();
    }
}

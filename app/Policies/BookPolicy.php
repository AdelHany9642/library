<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any books.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->isStudent();
    }

    /**
     * Determine whether the user can view the book.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function view(User $user, Book $book)
    {
        return $user->isAdmin() || ($user->isStudent() && $book->getQuantity() > 0);
    }

    /**
     * Determine whether the user can create books.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the book.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function update(User $user, Book $book)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function delete(User $user, Book $book)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can borrow the book.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function borrow(User $user, Book $book)
    {
        return $user->isStudent() && !$book->hasBeenBorrowedBy($user);
    }

    /**
     * Determine whether the user can return the book.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Book $book
     * @return mixed
     */
    public function return(User $user, Book $book)
    {
        return $user->isStudent() && $book->hasBeenBorrowedBy($user);
    }
}

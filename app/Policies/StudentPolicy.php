<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Student;
use Illuminate\Auth\Access\HandlesAuthorization;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any students.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the student.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Student $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        return $user->isAdmin() || $user->is($student);
    }

    /**
     * Determine whether the user can create students.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the student.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Student $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Student $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        return $user->isAdmin();
    }
}

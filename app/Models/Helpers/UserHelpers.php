<?php

namespace App\Models\Helpers;

use App\Models\User;

trait UserHelpers
{
    /**
     * Determine whether the user type is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->type == User::ADMIN_TYPE;
    }

    /**
     * Determine whether the user type is admin.
     *
     * @return bool
     */
    public function isStudent()
    {
        return $this->type == User::STUDENT_TYPE;
    }

    /**
     * Determine whether the user can access dashboard.
     *
     * @return bool
     */
    public function canAccessDashboard()
    {
        return $this->isAdmin() || $this->isStudent();
    }
}

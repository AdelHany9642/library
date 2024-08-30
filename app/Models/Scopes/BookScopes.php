<?php

namespace App\Models\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait BookScopes
{
    /**
     * Get only orders belongs to user.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder
     * @param  int|\App\Models\User $user
     * @return \Illuminate\Database\Eloquent\Builder $builder
     */
    public function scopeOfUser(Builder $builder, User $user = null): void
    {
        $user ?? $user = auth()->user();

        if ($user->isStudent()) {
            $builder->whereDoesntHave(
                'students',
                fn ($query) => $query->where('user_id', $user->getKey())->whereNotNull('returned_at')
            )
            ->withCount('students')
            ->havingRaw('SUM(quantity - students_count) > 0')
            ->groupBy('id');
        }
    }
}

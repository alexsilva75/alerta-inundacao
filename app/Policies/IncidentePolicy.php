<?php

namespace App\Policies;

use App\Models\Incidente;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IncidentePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Incidente $incidente): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Incidente $incidente): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $incidente->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Incidente $incidente): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $incidente->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Incidente $incidente): bool
    {
        if ($user->is_admin) {
            return true;
        }

        return $user->id === $incidente->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Incidente $incidente): bool
    {
        return $user->is_admin;
    }
}

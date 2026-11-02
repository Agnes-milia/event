<?php

namespace App\Policies;

use App\Models\User;
use App\Models\registration;
use Illuminate\Auth\Access\Response;

class RegistrationPolicy
{
    //?bool jelentése: true vagy false vagy null
    public function before(User $user): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }
        return null; // Ha nem admin, megy tovább a lentebbi checkekre
    }
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
    public function view(User $user, registration $registration): bool
    {
        // Csak az, akié a regisztráció
        return $user->id === $registration->user_id;
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
    public function update(User $user, registration $registration): bool
    {
        return $user->id === $registration->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, registration $registration): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, registration $registration): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, registration $registration): bool
    {
        return false;
    }
}

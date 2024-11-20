<?php

namespace App\Policies;

use App\Models\Club;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClubPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Club $club): bool
    {
        if ($user->is_admin) {
            return true;
        }

       
        return $club->memberships()
            ->where('user_id', $user->id)
            ->exists();
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->is_admin; 
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Club $club): bool
    {
        if ($user->is_admin) {
            return true; 
        }


        $isLeaderOrFaculty = $user->clubMemberships()
            ->where('club_id', $club->id)
            ->whereIn('role', ['leader', 'faculty'])
            ->exists();

        return $isLeaderOrFaculty;


    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Club $club): bool
    {
         return $user->is_admin; 
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Club $club): bool
    {
         return $user->is_admin; 
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Club $club): bool
    {
         return $user->is_admin; 
    }

    public function requestToJoin(User $user, Club $club): bool
    {
        // if already member cannot request to join
        return !$club->memberships()
            ->where('user_id', $user->id)
            ->exists();
    }
}

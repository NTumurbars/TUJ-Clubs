<?php

namespace App\Policies;

use App\Models\ClubMembership;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ClubMembershipPolicy
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
    public function view(User $user, ClubMembership $membership): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, ClubMembership $membership): bool
    {
        if ($user->is_admin) {
            return true; 
        }


        $isLeaderOrFaculty = $membership
            ->whereIn('role', ['leader', 'faculty'])
            ->exists();

        return $isLeaderOrFaculty;

        
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ClubMembership $membership)
    {

        if ($user->is_admin) {
            return true;
        }


        $rolesRank = [
            'member' => 1,
            'leader' => 2,
            'faculty' => 3,
        ];

        $userRole = $user->getRoleInClub($membership->club->id);
        $targetRole = $membership->role;

        // User can update memberships with a lower role
        if($rolesRank[$userRole] > $rolesRank[$targetRole])
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ClubMembership $membership)
    {
        if ($user->is_admin) {
            return true;
        }


        $rolesRank = [
            'member' => 1,
            'leader' => 2,
            'faculty' => 3,
        ];

        $userRole = $user->getRoleInClub($membership->club->id);
        $targetRole = $membership->role;

        // User can update memberships with a lower role
        if($rolesRank[$userRole] > $rolesRank[$targetRole])
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ClubMembership $clubMembership): bool
    {
        if ($user->is_admin) 
        {
            return true; 
        }
        else
        {
            return false;
        }
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ClubMembership $clubMembership): bool
    {
      if ($user->is_admin) 
        {
            return true; 
        }
        else
        {
            return false;
        }
    }
}

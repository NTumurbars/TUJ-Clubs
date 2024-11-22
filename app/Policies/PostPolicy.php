<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use App\Models\Club;
use Illuminate\Auth\Access\Response;

class PostPolicy
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
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    public function createGlobalAdmin(User $user)
    {
        // Only Admins can create global posts that are not on behalf of clubs
        return $user->isAdmin();
    }

     public function createGlobalClub(User $user, Club $club)
    
    {
        // Club Leaders and Faculty can create global posts on behalf of their club
        
        if($user->isAdmin())
        {
            return true;
        }

        $membership = $club->users()->where('user_id', $user->id)->first();
        if(in_array($membership->pivot->role, ['leader', 'faculty']))
        {
            return true;
        }

        return false;
    }

    public function createClub(User $user, Club $club)
    {
        //admin and any other club members can post in club
        if($user->isAdmin())
        {
            return true;
        }

        if($club->users()->where('user_id', $user->id)->exists())
        {
            return true;
        }
        return false;
    }


    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post)
    {
        // Admins should be able to update any post
        if ($user->isAdmin()) {
            return true;
        }

        //and users should be able to update their own posts

        if($post->user_id === $user->id)
        {
            return true;
        }

        
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): bool
    {
                // Admins should be able to update any post
        if ($user->isAdmin()) {
            return true;
        }

        //and users should be able to update their own posts

        if($post->user_id === $user->id)
        {
            return true;
        }

        
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Post $post): bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Post $post): bool
    {
            
        if ($user->isAdmin()) {
            return true;
        }

        
        return false;
    }
}

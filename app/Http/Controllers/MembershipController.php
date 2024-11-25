<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubMembership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MembershipController extends Controller
{




    public function members(Club $club)
    {

            //I want to only browse clubs where the user is not part of since the joined clubs will be displayed anyway
            return view('members.main', compact('club'));
    }

    public function edit(Club $club, ClubMembership $membership)
    {
        $this->authorize('update', $membership);

        $currentUser = Auth::user();
        $userRole = $currentUser->getRoleInClub($club->id);
        $roles = $this->getAllowedRoles($currentUser, $userRole);
        return view('members.edit', compact('club', 'membership', 'roles'));
    }


    public function update(Request $request, Club $club, ClubMembership $membership)
    {
        $this->authorize('update', $membership);

        $validated = $request->validate([
            'role' => 'required|in:leader,member,faculty',
        ]);

        $membership->update($validated);

        return redirect()->route('members', compact('club'))->with('success', 'Role updated successfully.');
    }

    protected function getAllowedRoles($user, $userRole)
    {
        if ($user->is_admin) {
            return ['member', 'leader', 'faculty'];
        }

        switch ($userRole) {
            case 'faculty':
                return ['member', 'leader'];
            case 'leader':
                return ['member'];
            default:
                return []; 
        }
    }

    public function removeMember(Club $club, ClubMembership $membership)
    {
        $this->authorize('delete', $membership);

        $membership->delete();

        return redirect()->route('members', compact('club'))->with('success', 'Member removed successfully.');
    }
}
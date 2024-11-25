<?php

namespace App\Http\Controllers;

use App\Models\Club;

use App\Models\ClubMembership;
use App\Models\JoinRequest;
use Illuminate\Http\Request;

class JoinRequestController extends Controller
{
 
    public function save(Request $request, Club $club)
    {
        $data = $request->validate([
            'answer' => 'required|string',
        ]);

        // Check for existing pending request
        $pendingRequest = JoinRequest::where('user_id', auth()->id())
            ->where('join_form_id', $club->joinForm->id)
            ->where('status', 'pending')
            ->first();

        if ($pendingRequest) {
            return redirect()->route('clubs.browse')
                ->with('error', 'You have a pending request. Please wait for it to be processed.');
        }

        // Create a new join request
        JoinRequest::create([
            'user_id' => auth()->id(),
            'join_form_id' => $club->joinForm->id,
            'answer' => $data['answer'],
            'status' => 'pending',
            'requested_at' => now(),
        ]);

        return redirect()->route('clubs.browse')
            ->with('success', 'Your request has been submitted.');
    }



    public function main(Club $club)
    {
        $this->authorize('update', $club);

        $requests = $club->joinForm->joinRequests()
            ->where('status', 'pending')
            ->with('user')
            ->get();

        return view('join_requests.main', compact('club', 'requests'));
    }

    public function approve(Club $club, JoinRequest $request)
    {
        $this->authorize('update', $club);

        // Update request status
        $request->update([
            'status' => 'approved',
            'responder_id' => auth()->id(),
            'responded_at' => now(),
        ]);


        ClubMembership::create([
            'club_id' => $club->id,
            'user_id' => $request->user_id,
            'role' => 'member',
        ]);


        return redirect()->route('requests.main', $club)
            ->with('success', 'Request approved.');
    }

    public function reject(Club $club, JoinRequest $request)
    {
        $this->authorize('update', $club);

        // Update request status
        $request->update([
            'status' => 'rejected',
            'responder_id' => auth()->id(),
            'responded_at' => now(),
        ]);

        return redirect()->route('requests.main', $club)
            ->with('success', 'Request rejected.');
    }
}

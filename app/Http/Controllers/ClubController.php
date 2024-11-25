<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\ClubMembership;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\JoinForm;

class ClubController extends Controller
{


    public function main()
    {
        $userClubs = collect(); 
        
        if(Auth::check())
        {
            $userClubs = Auth::user()->clubs;
        }
        

        return view('clubs.main', compact( 'userClubs'));
    }
    


    //This will just redirects to club create view
    public function create()
    {
        $this->authorize('create', Club::class);

        return view('clubs.create');
    }

    //This is the function to save new club
    public function save(Request $request)
    {
        //Well I know I don't need to authorize everytime but I will leave it in every function just to be safe. 
        //Because the only way to go to save is through create view and create view already authorizes 
        $this->authorize('create', Club::class);

        $validated = $request->validate([
            'name' => 'required|unique:clubs|max:255',
            'bio' => 'nullable',
        ]);

        $club = Club::create($validated);

        $club->joinForm()->create([
            'title' => 'Join ' . $club->name,
            'question' => 'Why do you want to join us?',
        ]);

        return redirect()->route('clubs.main')->with('success', 'Club "' . $club->name . '" created successfully.');
    }

    public function browse()
    {

        //I want to only browse clubs where the user is not part of since the joined clubs will be displayed anyway
        $userClubIds = [];
        if (Auth::check()) {
            $userClubIds = Auth::user()->clubs->pluck('id')->toArray(); // Need to have the ids in an array not jus the club object like in the main
        }
        

        $clubs = Club::withCount('memberships')
            ->with('users')
            ->whereNotIn('id', $userClubIds)
            ->get();

        return view('clubs.browse', compact('clubs'));
    }

    
    


    public function display(Club $club)
    {
        $this->authorize('view', $club);
        //adding posts and memberships to the club object
        $club->load( 'posts');
        $club->loadCount('memberships');

        return view('clubs.display', compact('club'));
    }

   


    //Redirects to club edit view
    public function edit(Club $club)
    {
        $this->authorize('update', $club);

        return view('clubs.edit', compact('club'));
    }


    //This one is the function to update the club details
    public function update(Request $request, Club $club)
    {
        $this->authorize('update', $club);

        $validated = $request->validate([
            'name' => 'required|max:255|unique:clubs,name,' . $club->id,
            'bio' => 'nullable',
        ]);

        $club->update($validated);

        return redirect()->route('clubs.display', $club)->with('success', 'Club updated successfully.');
    }

    public function delete(Club $club)
    {
        $this->authorize('delete', $club);

        $club->delete();

        return redirect()->route('clubs.main')->with('success', 'Club deleted successfully.');
    }



    //a way to get the joinform of the club
    public function joinForm()
    {
        return $this->hasOne(JoinForm::class);
    }

    //This will be implemented with the form later. 
     public function requestToJoin(Club $club)
    {
        $this->authorize('requestToJoin', $club);

        //This will be implemented in the future
        ClubMembership::create([
            'club_id' => $club->id,
            'user_id' => Auth::id(),
            'role' => 'member',
        ]);

        return redirect()->route('clubs.display', $club)->with('success', 'Your request to join the club has been accepted.');
    }
}

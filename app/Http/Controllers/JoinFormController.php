<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;

class JoinFormController extends Controller
{

    //just one view to show the join form
    public function display(Club $club)
    {
        $joinForm = $club->joinForm;;

        return view('join_forms.main', compact('joinForm', 'club'));
    }

    public function edit(Club $club)
    {
        $joinForm = $club->joinForm;
        //I am using update policy in club because it basically checks the same thing. But mostly because I am too lazy to create a separate policy for everything.
        $this->authorize('update', $club);

        return view('join_forms.edit', compact('club', 'joinForm'));
    }

    public function update(Request $request, Club $club)
    {
        $joinForm = $club->joinForm;

        $this->authorize('update', $club);

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'question' => 'required|string',
        ]);

        $joinForm->update($data);

        return redirect()->route('clubs.display', $club)
            ->with('success', 'Join form updated successfully.');
    }

}

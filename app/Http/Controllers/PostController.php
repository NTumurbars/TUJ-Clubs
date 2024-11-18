<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{


    public function create(Club $club)
    {
        $this->authorize('createClub', [Post::class, $club]);

        return view('posts.create', compact('club'));
    }


    public function save(Request $request, Club $club)
    {
        $isGlobal = $request->has('is_global');
        Log::info('Is Global:', ['is_global' => $isGlobal]);
    
        if ($isGlobal) {
            Log::info('Authorizing with createGlobalClub policy.');
            $this->authorize('createGlobalClub', [Post::class, $club]);
        } else {
            Log::info('Authorizing with createClub policy.');
            $this->authorize('createClub', [Post::class, $club]);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_global' => 'boolean',
        ]);
        Log::info('Validation passed.');

        $post = new Post();
        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->is_global = $request->has('is_global') ? true : false;
        $post->user_id = Auth::id();
        $post->club_id = $club->id;
        $post->save();
         Log::info('Post saved successfully.', ['post_id' => $post->id]);

        return redirect()->route('clubs.display', $club)->with('success', 'Post created successfully.');
    }

    public function edit(Club $club, Post $post)
    {
        $this->authorize('update', $post);

        return view('posts.edit', compact('club', 'post'));
    }


    public function update(Request $request, Club $club, Post $post)
    {
        $this->authorize('update', $post);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_global' => 'sometimes|boolean',
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];
        $post->is_global = $request->has('is_global') ? true : false;
        $post->save();

        return redirect()->route('clubs.display', $club)->with('success', 'Post updated successfully.');
    }

    public function destroy(Club $club, Post $post)
    {
        $this->authorize('delete', $post);

        $post->delete();

        return redirect()->route('clubs.display', $club)->with('success', 'Post deleted successfully.');
    }
}
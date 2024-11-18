{{-- This is the clubs page view --}}
<x-layout>



    <div class="container">


        @auth

            <!-- Display Success Message -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if ($userClubs->isNotEmpty())
                <h1>Your Clubs</h1>
                <div class="row">
                    @foreach ($userClubs as $club)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $club->name }}</h5>
                                    <p class="card-text">{{ Str::limit($club->bio, 100) }}</p>
                                    <a href="{{ route('clubs.display', $club) }}" class="btn btn-primary">View Club</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>You are not a member of any clubs. You can browse clubs to find one.</p>
            @endif

            <a href="{{ route('clubs.browse') }}" class="btn btn-secondary mt-4">Browse Clubs</a>

            {{-- Create club button only available for admins --}}
            @if (auth()->user()->isAdmin())
                <a href="{{ route('clubs.create') }}" class="btn btn-success mt-4">Create Club</a>
            @endif
        @else
            <p> <a href="{{ route('login') }}"> Please log in to see your clubs.</a> </p>
        @endauth
    </div>

</x-layout>

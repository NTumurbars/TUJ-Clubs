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
                            <div class="card mb-5">
                                <div class="card-body">
                                    <h3 class="card-title">{{ $club->name }}</h3>
                                    <p class="card-text">{{ $club->bio }}</p>
                                    <br>
                                    <a href="{{ route('clubs.display', $club) }}" class="btn btn-primary">View Club</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>You are not a member of any clubs. You can browse clubs to request to join one.</p>
            @endif

            <br>

            <a href="{{ route('clubs.browse') }}" class="btn-primary">Browse Clubs</a>

            <br>

            @if (auth()->user()->isAdmin())
                <a href="{{ route('clubs.create') }}" class="btn-primary">Create Club</a>
            @endif
        @else
            <p> <a href="{{ route('login') }}"> Please log in to see your clubs.</a> </p>
        @endauth
    </div>

</x-layout>

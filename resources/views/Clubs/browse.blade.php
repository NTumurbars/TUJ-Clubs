<!-- resources/views/clubs/browse.blade.php -->

<x-layout>

    <div class="container">
        <h1>Browse Clubs</h1>

        @if ($clubs->isEmpty())
            <p>There are no clubs available to join at this time.</p>
        @else
            <div class="row">
                @foreach ($clubs as $club)
                    <div class="col-md-4">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">{{ $club->name }}</h5>
                                <p class="card-text">{{ Str::limit($club->bio, 100) }}</p>
                                <p>{{ $club->memberships_count }} Members</p>

                                @auth
                                    <form action="{{ route('clubs.requestToJoin', $club) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Request to Join</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </x-layout>

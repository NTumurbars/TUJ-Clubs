<x-layout>
    <h1>Pending Requests for {{ $club->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($requests as $request)
        <div class="card">
            <p><strong>User:</strong> {{ $request->user->name }}</p>
            <p><strong>Answer:</strong> {{ $request->answer }}</p>
            <div class="flex justify-end: space-between">
                <form action="{{ route('requests.approve', [$club, $request]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-create">Approve</button>
                </form>
                <form action="{{ route('requests.reject', [$club, $request]) }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-delete">Reject</button>

                </form>
            </div>

        </div>
    @endforeach

</x-layout>

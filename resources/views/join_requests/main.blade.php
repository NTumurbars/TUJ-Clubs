<x-layout>
    <h1>Pending Requests for {{ $club->name }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @foreach ($requests as $request)
        <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
            <p><strong>User:</strong> {{ $request->user->name }}</p>
            <p><strong>Answer:</strong> {{ $request->answer }}</p>
            <form action="{{ route('requests.approve', [$club, $request]) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Approve</button>
            </form>
            <form action="{{ route('requests.reject', [$club, $request]) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit">Reject</button>
            </form>
        </div>
    @endforeach

</x-layout>

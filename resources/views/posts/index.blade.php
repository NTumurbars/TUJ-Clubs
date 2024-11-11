<x-layout>

    @if (auth()->check())
        <div {{-- added some design. I think it looks good though.  --}}
            class="bg-green-50 border border-green-200 text-green-600 px-3 py-2 rounded-lg shadow-sm mb-3 text-sm font-medium">
            Welcome, {{ auth()->user()->name }}!
        </div>
    @else
        <div
            class="bg-blue-50 border border-blue-200 text-blue-600 px-3 py-2 rounded-lg shadow-sm mb-3 text-sm font-medium">
            Welcome, guest! <a href="/login" class="underline text-blue-500 hover:text-blue-700">Log in</a> to access
            club features.
        </div>
    @endif

    <br>

    <h1 class="text-4xl font-bold">
        HomePage
    </h1>
</x-layout>

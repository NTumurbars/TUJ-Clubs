<x-layout>
    <div class="container mx-auto p-6">
        <h2 class="text-2xl font-bold mb-4">Edit Member Role</h2>

        <form action="{{ route('members.update', [$club, $membership]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="role" class="block text-gray-700">Role:</label>
                <select name="role" id="role" class="mt-3 block border-gray-600 rounded-md shadow-sm">
                    @foreach ($roles as $role)
                        <option value="{{ $role }}" {{ $membership->role === $role ? 'selected' : '' }}>
                            {{ ucfirst($role) }}
                        </option>
                    @endforeach
                </select>
                @error('role')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex items-center">
                <button type="submit" class="btn btn-primary">Update Role</button>
                <a href="{{ route('members', $club) }}" class="btn btn-secondary ml-4">Cancel</a>
            </div>
        </form>
    </div>
</x-layout>

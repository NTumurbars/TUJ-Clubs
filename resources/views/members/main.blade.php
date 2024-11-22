<x-layout>
    <div class="space-y-6">
        @forelse ($club->memberships as $membership)
            <div class="card">
                <div class="card-header">
                    <div class="flex items-center">
                        <img class="w-16 h-16 rounded-full object-cover mr-4"
                            src="{{ $membership->user->profile_photo_link ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}"
                            alt="user photo">

                        <div>
                            <h4>
                                Role:
                                <span
                                    class="{{ $membership->user->getRoleColor($membership->user->getRoleInClub($club->id)) }}">
                                    {{ ucfirst($membership->user->getRoleInClub($club->id)) }}
                                </span>
                            </h4>
                            <h4>
                                Name: {{ $membership->user->name }}
                            </h4>
                            <h5 class="text-sm text-gray-500">Became Member on:
                                {{ $membership->created_at->format('M d, Y') }}</h5>
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        @can('update', $membership)
                            <a href="{{ route('members.edit', [$club, $membership]) }}" class="btn btn-edit">
                                <i class="mr-1"></i> Change Role
                            </a>
                        @endcan

                        @can('delete', $membership)
                            <form action="{{ route('members.remove', [$club, $membership]) }}" method="POST"
                                onsubmit="return confirm('Do you really want to remove this member?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    <i class="mr-1"></i> Kick
                                </button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No members available at the moment</p>
        @endforelse
    </div>
</x-layout>

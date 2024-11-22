      <x-layout>
          <div class="space-y-6">
              @forelse ($club->memberships as $membership)
                  <div class="card">
                      {{-- the card header contains profile picture name and edit and delete button --}}
                      <div class="card-header">
                          <div class="flex items-center">
                              {{-- the profile pciture --}}
                              <img class="w-16 h-16 rounded-full object-cover mr-4"
                                  src="{{ $membership->user->profile_photo_link ?? 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSa176-tAid4pc1T8-sMsYnxJ_QFyhXAahbOA&s' }}"
                                  alt="user photo">

                              {{-- member information --}}
                              <div>

                                  <h4>

                                      Role:
                                      <span
                                          class="{{ $membership->user->getRoleColor($membership->user->getRoleInClub($club->id)) }}">{{ $membership->user->getRoleInClub($club->id) }}</span>

                                  </h4>
                                  <h4>
                                      Name: {{ $membership->user->name }}

                                  </h4>

                                  <h5 class="text-sm text-gray-500">Became Member on : {{ $membership->created_at }}</h5>
                              </div>
                          </div>

                          {{-- <div class="flex space-x-2">
                              @can('update', $post)
                                  <a href="{{ route('posts.edit', [$club, $post]) }}" class="btn btn-edit">
                                      <i class="mr-1"></i> Edit
                                  </a>
                              @endcan

                              @can('delete', $post)
                                  <form action="{{ route('posts.destroy', [$club, $post]) }}" method="POST"
                                      onsubmit="return confirm('Do you really want to delete this post?');">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-delete">
                                          <i class="mr-1"></i> Delete
                                      </button>
                                  </form>
                              @endcan
                          </div> --}}
                      </div>


                      {{-- <div class="mb-4">
                          <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $post->title }}</h3>
                          <p class="text-gray-700">{{ $post->content }}</p>
                      </div> --}}

                  </div>
              @empty
                  <p class="text-gray-600">No posts available at the moment</p>
              @endforelse
          </div>
      </x-layout>

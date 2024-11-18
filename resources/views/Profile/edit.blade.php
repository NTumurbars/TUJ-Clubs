<x-layout>
    <section class="min-h-screen flex items-center justify-center py-10 dark:bg-gray-100">
        <div class="w-full mx-auto flex flex-col gap-4 px-4">
            <div class="w-full shadow-2xl p-6 rounded-xl dark:bg-gray-50/40">
                <div>
                    <h1 class="text-center text-3xl font-extrabold mb-2 dark:text-black">Edit Profile</h1>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')

                        <div class="mx-auto flex justify-center w-[200px] h-[200px] bg-blue-300/20 rounded-full bg-cover bg-center mb-4"
                            style="background-image: url('{{ $user->profile_photo_link ?? 'https://www.google.com/imgres?q=temple%20owl%20icon&imgurl=https%3A%2F%2Fbrandslogos.com%2Fwp-content%2Fuploads%2Fimages%2Flarge%2Ftemple-owls-logo.png&imgrefurl=https%3A%2F%2Fbrandslogos.com%2Ft%2Ftemple-owls-logo%2F&docid=9LD6o8DoD5nAYM&tbnid=9LX3xPPZImnTwM&vet=12ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA..i&w=1280&h=1280&hcb=2&ved=2ahUKEwjgj76yvdiJAxX1a_UHHXrHLtQQM3oECDAQAA' }}');">

                        </div>

                        <!-- Name Input -->
                        <div class="mb-4">
                            <label for="name"
                                class="block text-center text-lg font-semibold dark:text-black mb-2">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                                class="w-full p-3 border-2 rounded-lg dark:text-gray-800 dark:border-gray-600 dark:bg-gray-200"
                                placeholder="Enter your name" required>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>



                        <!-- Success Message -->
                        @if (session('success'))
                            <div class="mt-4 p-4 bg-green-500 text-white rounded">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="w-full rounded-lg bg-blue-500 mt-6 text-white text-lg font-semibold">
                            <button type="submit" class="block w-full p-4 text-center">Update Profile</button>
                        </div>





                        <div class="w-full rounded-lg bg-gray-500 mt-4 text-white text-lg font-semibold">
                            <a href="{{ route('profile.show') }}" class="block w-full p-4 text-center">Cancel</a>
                        </div>

                        <!-- Display Validation Errors -->
                        @if ($errors->any())
                            <div class="mt-4 p-4 bg-red-500 text-white rounded">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </form>


                </div>
            </div>
        </div>
    </section>
</x-layout>

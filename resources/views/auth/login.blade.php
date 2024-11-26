<x-layout>
<h1 class="title text-center text-3xl font-bold text-white">
    TUJ Clubs
</h1>
<br />
<p class="text-white text-center mb-4">We use Google authentication services to authenticate our users</p>
<p class="text-white text-center mb-8">Use your <strong class="text-pink-300">TU mail</strong> to gain access to the website and its features</p>

<div class="mx-auto max-w-sm card my-8 bg-gradient-to-r from-[#04030F] via-[#491111] to-[#8B0000] p-6 rounded-lg shadow-lg">
    @if ($errors->has('email'))
        <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2" role="alert">
            <p class="font-bold">Error</p>
            <p>{{ $errors->first('email') }}</p>
        </div>
        <br>
    @endif

    <!-- Google Login Button -->
    <a href="{{ route('login.google') }}" class="inline-block w-full">
        <button type="button" data-twe-ripple-init data-twe-ripple-color="light"
            class="w-full mb-2 inline-flex items-center justify-center rounded-full bg-[#04030F] p-3 text-xs font-medium text-[#73C2BE] shadow-md transition duration-200 ease-in-out hover:scale-105 hover:bg-[#73C2BE] hover:text-[#04030F] hover:border-[#73C2BE] focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg">
            
            <span class="flex items-center [&>svg]:h-8 [&>svg]:w-8 mr-3 transition duration-500 ease-in-out group-hover:scale-110">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                    <path
                        d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                    </path>
                </svg>
            </span>
            <span><em>Use me to get in</em></span>
        </button>
    </a>
</div>


</x-layout>

<x-layout>
    <h1 class="title">
        Join us
    </h1>

    <div class="mx-auto max-w-sm card float-left">
        @if ($errors->has('email'))
            <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-2" role="alert">
                <p class="font-bold">Error</p>
                <p> {{ $errors->first('email') }}</p>
            </div>
            <br>
        @endif

        <a href="{{ route('login.google') }}" class="btn btn-danger">
            <button type="button" data-twe-ripple-init data-twe-ripple-color="light" 
                class="mb-2 inline-block rounded-full bg-[#04030F] p-3 text-xs font-medium uppercase leading-normal text-[#73C2BE] shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg">
                <span class="[&>svg]:h-10 [&>svg]:w-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc. -->
                        <path
                            d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                        </path>
                    </svg>
                </span>
            </button>

        </a>
    </div>

</x-layout>

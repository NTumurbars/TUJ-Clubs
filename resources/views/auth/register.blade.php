<x-layout>
    <h1 class="title">
        Register a new account
    </h1>

    <div class="mx-auto max-w-sm card">
        <form action="{{ route('register') }}" method="POST">

            @csrf


            <div class="mb-4">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="input @error('name')inputerror @enderror"
                    value="{{ old('name') }}">
                @error('name')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="username">Username</label>
                <input type="text" name="username" id="username"
                    class="input @error('username')inputerror @enderror" value="{{ old('username') }}">
                @error('username')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="input @error('email')inputerror @enderror"
                    value="{{ old('email') }}">
                @error('email')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday"
                    class="input @error('birthday')inputerror @enderror" value="{{ old('birthday') }}">
                @error('birthday')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password">Password</label>
                <input type="password" name="password"
                    id="password"class="input @error('password')inputerror @enderror" value="{{ old('password') }}">
                @error('password')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="input">
                @error('password_confirmation')
                    <p>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <button type="submit" class="btn">Register</button>
        </form>
        <a href="{{ route('login.google') }}" class="btn btn-danger">
            Login with Google
        </a>
    </div>

</x-layout>

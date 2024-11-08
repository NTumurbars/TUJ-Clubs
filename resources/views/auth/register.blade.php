<x-layout>
    <h1 class="Welcome">
        Register a new account
    </h1>
    <p>
        Since this app is supposed to be a service provided by TUJ you are reqyuired to have a temple account to signup
    </p>
    <p>
        Use the google sign to sign up
    </p>
    <p>
        Clicking the google signin will take you to the google page which upon enetering your temple mail will redirect you to the temple login page
    </p>
    <div class="mx-auto max-w-sm card">
        <a href="{{ route('login.google') }}" class="btn btn-danger">
            Login with Google
        </a>
    </div>

</x-layout>

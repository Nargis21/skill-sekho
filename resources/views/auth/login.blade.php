<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" class="p-2" action="{{ route('login') }}">
        @csrf

        <div class="flex justify-center pb-8 pt-4">
            <a href="/">
                <x-application-logo class="w-50 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full text-sm" type="text" name="username" :value="old('username')" required autofocus  />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full text-sm" type="password" name="password" required autocomplete="current-password"  />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-start mt-4">
            @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>

        <!-- Remember Me
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div> -->

        <div class="mt-4 text-center">
            <x-primary-button class="w-full bg-blue-600 d-flex justify-center py-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-end mt-4">
            <p class="text-sm text-gray-600 pr-2">New to Skill Sekho?</p>
            <a class="underline text-sm text-blue-600 hover:text-violet-900 rounded-md " href="{{ route('register') }}">
                {{ __('Register') }}
            </a>

        </div>

    </form>

</x-guest-layout>
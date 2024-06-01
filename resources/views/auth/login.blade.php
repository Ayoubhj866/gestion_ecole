<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <x-bladewind.notification />

    <form method="POST" action="{{ route('login') }}" class="signup-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-bladewind::input prefix="user" prefix_is_icon="true" prefix_icon_css="text-gray-800" :value="old('email')"
                type="email" autofocus name="email" label="Email adress"
                error_message="You will need to enter your full name" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-bladewind::input name="password" type="password" placeholder="{{ __('Password') }}" prefix="key"
                prefix_is_icon="true" prefix_icon_css="text-gray-800" viewable="true" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-bladewind.button name="sign-in" has_spinner="true" color="black" can_submit="true" class="mt-3"
                name="sign-in" onclick="showButtonSpinner('.sign-in')">
                {{ __('Sign in') }}
            </x-bladewind.button>
        </div>
    </form>
</x-guest-layout>

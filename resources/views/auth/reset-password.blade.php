<x-layouts.auth>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-label for="email">{{ __('Email') }}</x-label>
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-error name="email" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-label for="password">{{ __('Password') }}</x-label>
            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-error name="password" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-label for="password_confirmation">{{ __('Confirm Password') }}</x-label>

            <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-error name="password_confirmation" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button type="submit">
                {{ __('Reset Password') }}
            </x-button>
        </div>
    </form>
</x-layouts.auth>

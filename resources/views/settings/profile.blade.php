<x-app-layout>
    <section class="w-full">
        @include('partials.settings-heading')

        <flux:heading level="2" class="sr-only">{{ __('Profile settings') }}</flux:heading>

        <x-settings.layout :heading="__('Profile')" :subheading="__('Update your name and email address')">
            <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                @csrf
                @method('patch')

                <x-label for="name">{{ __('Name') }} </x-label>
                <x-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required
                    autofocus autocomplete="name" />
                <x-error class="mt-2" name="name" />

                <div>
                    <x-label for="email">{{ __('Email') }} </x-label>
                    <x-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                        autocomplete="username" />
                    <x-error class="mt-2" name="email" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div>
                            <p class="text-sm mt-2 text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 font-medium text-sm text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                <x-input name="company[name]" :value="$user->company->name" label="Nom de l'entreprise" disabled />
                <x-input name="company[address][street]" :value="@$user->company->address->city" label="Adresse de l'entreprise" disabled />

                <div class="flex items-center gap-4">
                    <div class="flex items-center justify-end">
                        <flux:button variant="primary" type="submit" class="w-full" data-test="update-profile-button">
                            {{ __('Save') }}
                        </flux:button>
                    </div>

                </div>
            </form>

            {{-- @chisel-email-verification --}}
            @if ($showDeleteUser)
                {{-- @end-chisel-email-verification --}}
                <x-settings.delete-user-form />
                {{-- @chisel-email-verification --}}
            @endif
            {{-- @end-chisel-email-verification --}}
        </x-settings.layout>
    </section>

</x-app-layout>

<?php

namespace App\Livewire\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public string $name = '';
    public string $email = '';

    public string $company_name = '';
    public string $company_address_street = '';
    public string $company_address_city = '';

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;

        $this->company_name = Auth::user()->company->name;
        $this->company_address_street = Auth::user()->company->address->street;
        $this->company_address_city = Auth::user()->company->address->city;
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],

            'company_name' => ['required', 'string', 'max:255'],
            'company_address_street' => ['required', 'string', 'max:255'],
            'company_address_city' => ['required', 'string', 'max:255'],
        ]);

        $user->fill($validated);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Company
        $company = Auth::user()->company;
        if ($company) {
            $company->update([
                'name' => $this->company_name,
            ]);
        } else {
            $company = Auth::user()
                ->company()
                ->create([
                    'name' => $this->company_name,
                ]);
        }

        $address = $company->address;
        if ($address) {
            $address->update([
                'street' => $this->company_address_street,
                'city' => $this->company_address_city,
            ]);
        } else {
            $address = $company->address()->create([
                'street' => $this->company_address_street,
                'city' => $this->company_address_city,
            ]);
        }

        $user->save();

        $this->dispatch('profile-updated', name: $user->name);
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    public function render()
    {
        return view('livewire.settings.profile');
    }
}

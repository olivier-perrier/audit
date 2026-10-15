<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('settings.profile', [
            'user' => $request->user(),
            'showDeleteUser' => ! Auth::user() instanceof MustVerifyEmail
                || (Auth::user() instanceof MustVerifyEmail && Auth::user()->hasVerifiedEmail()),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->validated();

        // dd($data);

        $request->user()->fill($data);

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $company = $request->user()->company;
        if ($company) {
            $company->update([
                'name' => $data['company']['name'],
            ]);
        } else {
            $company = $request->user()->company()->create([
                'name' => $data['company']['name'],
            ]);
        }

        $address = $company->address;
        if ($address) {
            $address->update([
                'street' => $data['company']['address']['street'],
                'city' => $data['company']['address']['city'],
            ]);
        } else {
            $address = $company->address()->create([
                'street' => $data['company']['address']['street'],
                'city' => $data['company']['address']['city'],
            ]);
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}

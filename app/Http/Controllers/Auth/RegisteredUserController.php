<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Family;
use App\Models\Identity;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\LastEdu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

                // Create identity record with proper validation
                $identity = Identity::create([
                    'nik' => $request->nik,
                    'user_id' => auth()->id() // Assuming nik field exists in identities table
                ]);

                Address::create([
                    'nik' => $request->nik,
                    'type' => 'ktp_domicile',
                ]);

                Address::create([
                    'nik' => $request->nik,
                    'type' => 'current_domicile',
                ]);

                // Create family records with proper relationship
                Family::create([
                    'nik' => $request->nik,
                    'type' => 'father',
                ]);

                Family::create([
                    'nik' => $request->nik,
                    'type' => 'mother',
                ]);

                Family::create([
                    'nik' => $request->nik,
                    'type' => 'guardian',
                ]);

                LastEdu::create([
                    'nik' => $request->nik,
                ]);

        return redirect(route('dashboard', absolute: false));
    }
}

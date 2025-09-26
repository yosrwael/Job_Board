<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Notifications\NewUserRegisteredNotification;

class RegisteredUserController extends Controller
{
    /**
     * Show register page
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Store new user
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role'     => ['required', 'in:employer,candidate'],
            'phone' => 'required',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'company_name' => $request->company_name,
            'resume'       => $request->resume,
            'phone' => $request->phone,

            'company_name' => $request->role === 'employer' ? 'required|string|max:255' : 'nullable',
            'resume' => $request->role === 'candidate' ? 'required|string|max:255' : 'nullable',
        ]);

        $user->assignRole($request->role);

        event(new Registered($user));

        Auth::login($user);

        $admins = \App\Models\User::role('admin')->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewUserRegisteredNotification($user));
        }

        return redirect()->route('dashboard');
    }
}

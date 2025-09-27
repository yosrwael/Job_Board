<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;

class AdminController extends Controller
{
    public function users(){
        $users = User::with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }
    

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'] ?? null,
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['role']);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }
    
    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User deleted successfully');
    }

}

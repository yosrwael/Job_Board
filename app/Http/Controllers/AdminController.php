<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function users(){
        $users = User::with('roles')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User deleted successfully');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index() {

        $users = User::where('role', 'user')->get();

        return view('pengguna.index', compact(['users']));
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index');
    }
}

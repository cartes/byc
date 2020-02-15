<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Region;
use App\User;
use App\UserMeta;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show()
    {
        $users = User::with('meta', 'seller')
            ->paginate(50);

        return view('users.list', compact('users'));
    }

    public function edit(User $user)
    {
        $meta = UserMeta::where('user_id', '=', $user->id)->first();
        $region = Region::all();
        $communes = Commune::all();
        if (auth()->user()->id == $user->id) {
            return view('users.detail', compact('user', 'meta', 'communes', 'region'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }


}

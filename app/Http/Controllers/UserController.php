<?php

namespace App\Http\Controllers;

use App\Commune;
use App\Http\Requests\UserEditRequest;
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
        $meta = UserMeta::where('user_id', '=', $user->id)
            ->first();

        $region = Region::with('communes')
            ->get();
        if ($meta->region_id) {
            $commune = Commune::whereRegionId($meta->region_id)
                ->orderBy('name')
                ->get();
        }

        if (auth()->user()->id == $user->id) {
            return view('users.detail', compact('user', 'meta', 'commune', 'region'));
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function storeMeta(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);
        UserMeta::updateOrCreate(['user_id' => auth()->user()->id], $request->input());

        return back()->with('message', ['success', 'Los datos fueron editados con éxito']);
    }

    public function store(UserEditRequest $request)
    {
        User::whereId(auth()->user()->id)
            ->update([
                "name" => $request->name,
                "last_name" => $request->last_name,
                "email" => $request->email,
                "phone" => $request->phone,
            ]);

        return back()->with('message', ["success", "Sus datos de contacto han sido actualizados"]);
    }

}

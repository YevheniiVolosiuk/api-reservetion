<?php

namespace App\Http\Controllers\API\Auth;

use App\Enums\Role;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'max:255',],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::default()],
            'role_id' => ['required', Rule::in(Role::ROLE_OWNER,Role::ROLE_USER)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user->assignRole($request->role_id);

        return response()->json([
            'access_token' => $user->createToken('client')->plainTextToken,
        ]);
    }
}

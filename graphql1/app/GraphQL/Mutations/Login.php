<?php 

namespace App\GraphQL\Mutations;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login {
    public function __invoke($root, array $args) {
        $input = $args['input'];
        $user = User::where('email', $input['email'])->first();

        if (! $user || ! Hash::check($input['password'], $user->password)) {
            throw ValidationException::withMessages(['email' => ['A megadott adatok helytelenek.']]);
        }

        // Token generálása a Sanctum segítségével
        $token = $user->createToken('auth_token')->plainTextToken;

        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}


<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) // Best Practice: Encryption
        ]);

        return response()->json(['message' => 'User registered successfully'], 201); // Return Code 201
    }

    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = base64_encode(Str::random(40));
            $user->update(['api_token' => $token]);
            return response()->json(['token' => $token], 200);
        }

        // Logging untuk Error Debugging
        \Log::warning('Login failed for email: ' . $request->email);
        return response()->json(['message' => 'Unauthorized'], 401); // Return Code 401
    }
}
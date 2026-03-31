<?php

namespace App\Http\Controllers;

use App\Models\TokenBlacklist;
use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ── POST /api/register ────────────────────────────────────────
    public function register(Request $request): JsonResponse
    {
        $username = trim($request->input('username', ''));
        $email    = trim($request->input('email', ''));
        $password = $request->input('password', '');

        if (!$username || !$email || !$password) {
            return response()->json(['success' => false, 'message' => 'All fields are required'], 400);
        }

        try {
            $exists = User::where('email', $email)->orWhere('username', $username)->first();
            if ($exists) {
                return response()->json(['success' => false, 'message' => 'Username or email already exists'], 409);
            }

            $hashed = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

            $user = User::create([
                'username' => $username,
                'email'    => $email,
                'password' => $hashed,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Account created successfully.',
                'data'    => ['id' => $user->id, 'username' => $username, 'email' => $email],
            ], 201);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── POST /api/login ───────────────────────────────────────────
    public function login(Request $request): JsonResponse
    {
        $email    = trim($request->input('email', ''));
        $password = $request->input('password', '');

        if (!$email || !$password) {
            return response()->json(['success' => false, 'message' => 'Email and password are required'], 400);
        }

        try {
            $user = User::where('email', $email)->first();

            if (!$user || !password_verify($password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Invalid email or password'], 401);
            }

            $secret  = env('JWT_SECRET', '');
            $payload = [
                'id'       => $user->id,
                'username' => $user->username,
                'email'    => $user->email,
                'iat'      => time(),
                'exp'      => time() + 86400,
            ];
            $token = JWT::encode($payload, $secret, 'HS256');

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
                'data'    => [
                    'token' => $token,
                    'user'  => [
                        'id'       => $user->id,
                        'username' => $user->username,
                        'email'    => $user->email,
                    ],
                ],
            ]);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }

    // ── POST /api/logout ──────────────────────────────────────────
    public function logout(Request $request): JsonResponse
    {
        $token = $request->attributes->get('token');

        try {
            TokenBlacklist::create(['token' => $token, 'created_at' => now()]);

            return response()->json(['success' => true, 'message' => 'Logged out successfully']);

        } catch (\Throwable $e) {
            return response()->json(['success' => false, 'message' => 'Server error', 'error' => $e->getMessage()], 500);
        }
    }
}

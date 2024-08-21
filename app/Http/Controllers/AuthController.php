<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login($data)
    {
        $token =  auth()->attempt($data);
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } else {
            $payload = JWTAuth::setToken($token)->getPayload();
            $payloadData = $payload->toArray();
            if (isset($payloadData['roles']) && !empty($payloadData['roles'])) {
                if (in_array("store_manager", $payloadData['roles'])) {
                    return response()->json(['token' => $token, 'message' => "Logged in successfully!"], 201);
                } else {
                    return response()->json(['status' => 'error', 'message' => "Unauthorized"], 403);
                }
            } else {
                return response()->json(['status' => 'error', 'message' => "Unauthorized"], 403);
            }
        }
    }

    public function logOut()
    {
        try {
            JWTAuth::invalidate(JWTAuth::parseToken());
            return response()->json(['message' => 'Logged out successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to revoke token.'], 400);
        }
    }
}

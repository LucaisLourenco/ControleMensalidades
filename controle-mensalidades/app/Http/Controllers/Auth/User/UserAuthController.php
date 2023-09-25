<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserAuthController extends Controller
{
    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->only('username', 'password');

        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json(['error' => MyApp::USR001], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => MyApp::USR002], 500);
        }

        return response()->json(compact('token'));
    }

    public function me(): \Illuminate\Http\JsonResponse
    {
        try {
            $user = auth('api')->user();
        } catch (JWTException $e) {
            return response()->json(['error' => MyApp::USR003], 500);
        }

        return response()->json(compact('user'));
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        try {
            auth('api')->logout();
        } catch (JWTException $e) {
            return response()->json(['error' => MyApp::USR004], 500);
        }

        return response()->json(['message' => MyApp::USR005]);
    }
}

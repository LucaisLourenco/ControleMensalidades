<?php

namespace App\Http\Controllers\Auth\User;

use App\Enum\Auth\EnumUserAuth;
use App\Enum\Standard\EnumStandard;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserAuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(EnumUserAuth::USERNAME, EnumUserAuth::PASSWORD);

        try {
            if (!$token = auth(EnumUserAuth::API)->attempt($credentials)) {
                return response()->json([EnumStandard::ERROR => 'Test'], 401);
            }
        } catch (JWTException $e) {
            return response()->json([EnumStandard::ERROR => 'Test'], 500);
        }

        return response()->json($token);
    }

    public function me(): JsonResponse
    {
        try {
            $user = auth(EnumUserAuth::API)->user();
        } catch (JWTException $e) {
            return response()->json([EnumStandard::ERROR => 'Test'], 500);
        }

        return response()->json($user);
    }

    public function logout(): JsonResponse
    {
        try {
            auth(EnumUserAuth::API)->logout();
        } catch (JWTException $e) {
            return response()->json([EnumStandard::ERROR => 'Test'], 500);
        }

        return response()->json([EnumStandard::MESSAGE => 'Test']);
    }
}

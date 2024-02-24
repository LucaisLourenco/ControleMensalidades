<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Auth\User\Interface\VariableAuthController;
use App\Http\Controllers\Controller;
use App\Messages\User\MessageUser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserAuthController extends Controller implements VariableAuthController
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only(self::USERNAME, self::PASSWORD);

        try {
            if (!$token = auth(self::API)->attempt($credentials)) {
                return response()->json([self::ERROR => MessageUser::USR0001], 401);
            }
        } catch (JWTException $e) {
            return response()->json([self::ERROR => MessageUser::USR0001], 500);
        }

        return response()->json($token);
    }

    public function me(): JsonResponse
    {
        try {
            $user = auth(self::API)->user();
        } catch (JWTException $e) {
            return response()->json([self::ERROR => MessageUser::USR0001], 500);
        }

        return response()->json($user);
    }

    public function logout(): JsonResponse
    {
        try {
            auth(self::API)->logout();
        } catch (JWTException $e) {
            return response()->json([self::ERROR => MessageUser::USR0001], 500);
        }

        return response()->json([self::MESSAGE => MessageUser::USR0001]);
    }
}

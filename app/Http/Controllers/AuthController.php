<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CheckEmailVerificationCodeRequest;
use App\Http\Requests\Auth\LoginUserRequest;
use App\Http\Requests\Auth\RegisterUserRequest;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\SendRecoverPassowrdEmailRequest;
use App\Mail\EmailRecoverPassword;
use App\Mail\EmailVerificationCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    /**
     * Login User
     * 
     * This endpoint allows native user login.
     * @unauthenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request): JsonResponse
    {

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => false,
                'message' => __('app.login_fail'),
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => true,
            'message' => __('app.success'),
            'token' => $user->createToken("API TOKEN")->plainTextToken,
            'user' => $user
        ], 200);
    }
}
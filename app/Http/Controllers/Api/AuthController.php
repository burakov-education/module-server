<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * User registration
     *
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function registration(RegistrationRequest $request): JsonResponse
    {
        User::query()->create($request->validated());

        return response()->json([
            'success' => true,
        ], 201);
    }

    /**
     * User auth
     *
     * @param LoginRequest $request
     * @return JsonResponse|array
     */
    public function login(LoginRequest $request): JsonResponse|array
    {
        if (auth()->attempt($request->validated())) {
            return [
                'token' => auth()->user()->createToken('api')->plainTextToken,
            ];
        }

        return response()->json([
            'message' => 'Invalid data',
            'errors' => [
                'email' => [
                    'Invalid data',
                ],
            ]
        ], 422);
    }
}
